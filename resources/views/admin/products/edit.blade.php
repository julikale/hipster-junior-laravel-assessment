@extends('admin.layouts.app')

@section('content')
<h2>Edit Product</h2>

@if ($errors->any())
    <div style="color:red;">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<form method="POST" action="{{ route('admin.products.update', $product->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ old('name', $product->name) }}" placeholder="Name"><br><br>

    <textarea name="description" placeholder="Description">{{ old('description', $product->description) }}</textarea><br><br>

    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" placeholder="Price"><br><br>

    <input type="text" name="category" value="{{ old('category', $product->category) }}" placeholder="Category"><br><br>

    <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Stock"><br><br>

    <input type="text" name="image" value="{{ old('image', $product->image) }}" placeholder="Image name"><br><br>

    <button type="submit">Update Product</button>
</form>

<a href="{{ route('admin.products.index') }}">⬅ Back</a>
@endsection
