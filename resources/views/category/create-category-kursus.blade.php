@extends('layout')

@section('content')
<div class="container mt-5">
    <form action="/panel/category/proses-create" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_category" class="form-label">Nama Category:</label>
            <input type="text" class="form-control" id="nama_category" name="nama_category" required>
            @error('nama_category')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image:</label>
            <input class="form-control" type="file" name="image" id="formFile">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Category</button>
        <a href="/panel/data" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
