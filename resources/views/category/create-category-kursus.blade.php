@extends('layout')
@section('content')


<form action="/panel/category/proses-create" method="POST" enctype="multipart/form-data" >
    @csrf
    <div>
        <label for="nama_kursus">Nama Category:</label>
        <input type="text" id="nama_category" name="nama_category" required>
        @if ($errors->has('nama_category'))
        <span class="text-red-500">{{ $errors->first('nama_category') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" type="file" name="image" id="formFile">
        @if ($errors->has('image'))
            <span class="text-red-500">{{ $errors->first('image') }}</span>
        @endif
    </div>
    <div>
        <button type="submit">Tambah Category</button>
    </div>
</form>
@endsection

