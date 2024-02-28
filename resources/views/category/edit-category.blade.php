@extends('layout')
@section('content')
<form action="/panel/category/proses-edit/{{$category->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Bagian lain dari formulir -->
    <div>
        <label for="nama_category">Nama Category:</label>
        <input type="text" id="nama_category" name="nama_category" required value="{{ $category->nama_category }}">
    </div>
    <div class="form-group">
        <label for="current_image">Pilih Gambar Kursus</label><br>
        <img src="{{ Storage::url($category->image) }}" class="img-thumbnail" style="width:100px" /><br>
        <input type="file" class="form-control-file" id="image" name="image" >
    </div>
        <button type="submit">Edit Kursus</button>
    </div>
</form>
@endsection