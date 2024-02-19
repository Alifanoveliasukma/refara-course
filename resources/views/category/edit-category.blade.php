@extends('layout')
@section('content')
<form action="/panel/category/proses-edit/{{$category->id}}" method="POST">
    @csrf
    @method('PUT')

    <!-- Bagian lain dari formulir -->
    <div>
        <label for="nama_kursus">Nama Category:</label>
        <input type="text" id="nama_category" name="nama_category" required value="{{ $category->nama_category }}">
    </div>
        <button type="submit">Edit Kursus</button>
    </div>
</form>
@endsection