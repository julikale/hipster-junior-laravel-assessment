@extends('admin.layouts.app')

@section('content')
<h2>Bulk Product Upload</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<form method="POST"
      action="{{ route('admin.products.bulk.store') }}"
      enctype="multipart/form-data">
    @csrf

    <input type="file" name="file" required>
    @error('file') <p style="color:red">{{ $message }}</p> @enderror

    <br><br>
    <button type="submit">Upload CSV / Excel</button>
</form>
@endsection
