@extends('admin.layouts.app')

@section('content')
<h2>Products</h2>

<a href="{{ route('admin.products.create') }}">Add Product</a>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="5">
<tr>
    <th>Name</th><th>Price</th><th>Category</th><th>Stock</th><th>Action</th>
</tr>
@foreach($products as $product)
<tr>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->category }}</td>
    <td>{{ $product->stock }}</td>
    <td>
        <a href="{{ route('admin.products.edit',$product) }}">Edit</a>
        <form method="POST" action="{{ route('admin.products.destroy',$product) }}">
            @csrf @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
