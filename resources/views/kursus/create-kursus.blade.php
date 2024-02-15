@extends('layout')
@section('content')
<form action="/panel/kursus/proses-create" method="POST">
    @csrf
    <div>
        <label for="nama_kursus">Nama Kursus:</label>
        <input type="text" id="nama_kursus" name="nama_kursus" required>
    </div>
    <div>
        <label for="nama_pembuat">Nama Pembuat:</label>
        <input type="text" id="nama_pembuat" name="nama_pembuat" required>
    </div>
    <div>
        <label for="deskripsi_kursus">Deskripsi Kursus:</label>
        <textarea id="deskripsi_kursus" name="deskripsi_kursus" required></textarea>
    </div>
    <div>
        <label for="harga_kursus">Harga Kursus:</label>
        <input type="number" id="harga_kursus" name="harga_kursus" required>
    </div>
    <div>
        <button type="submit">Tambah Kursus</button>
    </div>
</form>
@endsection

