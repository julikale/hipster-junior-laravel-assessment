@extends('admin.layouts.app')
@section('content')
<h2>Create Product</h2>
<form method="POST" action="{{ route('admin.products.store') }}">
@csrf
<input name="name" placeholder="Name"><br>
<input name="price" placeholder="Price"><br>
<input name="category" placeholder="Category"><br>
<input name="stock" placeholder="Stock"><br>
<input name="image" placeholder="Image name"><br>
<textarea name="description" placeholder="Description"></textarea><br>
<button type="submit">Save</button>
</form>
@endsection
