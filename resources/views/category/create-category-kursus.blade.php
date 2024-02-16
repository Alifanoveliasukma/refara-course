@extends('layout')
@section('content')


<form action="/panel/category/proses-create" method="POST">
    @csrf
    <div>
        <label for="nama_kursus">Nama Category:</label>
        <input type="text" id="nama_category" name="nama_category" required>
    </div>

    <div>
        <button type="submit">Tambah Category</button>
    </div>
</form>
@endsection

