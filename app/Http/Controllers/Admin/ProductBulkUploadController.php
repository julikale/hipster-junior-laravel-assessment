<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductBulkUploadController extends Controller
{
    // Show upload page
    public function create()
    {
        return view('admin.products.bulk-upload');
    }

    // Handle upload
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);

        Excel::queueImport(new ProductsImport, $request->file('file'));

        return back()->with('success', 'Bulk upload started successfully.');
    }
}
