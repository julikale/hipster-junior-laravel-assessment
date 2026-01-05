<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProductsImport implements ToModel, WithChunkReading, WithHeadingRow, WithValidation,ShouldQueue
{
    public function model(array $row)
    {
        return new Product([
            'name'        => $row['name'],
            'description' => $row['description'] ?? null,
            'price'       => $row['price'],
            'category'    => $row['category'],
            'stock'       => $row['stock'],
            'image'       => $row['image'] ?? 'default.png', // ✅ default image
        ]);
    }

    public function rules(): array
    {
        return [
            'name'     => 'required|string',
            'price'    => 'required|numeric|min:0',
            'category' => 'required|string',
            'stock'    => 'required|integer|min:0',
        ];
    }

    public function chunkSize(): int
    {
        return 1000; // ✅ chunked processing
    }
}
