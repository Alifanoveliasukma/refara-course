@extends('layout')
@section('content')
<form action="/panel/kursus/proses-edit/{{$kursus->id}}" method="POST">
    @csrf
    @method('PUT')

    <!-- Bagian lain dari formulir -->
    <div>
        <label for="nama_kursus">Nama Kursus:</label>
        <input type="text" id="nama_kursus" name="nama_kursus" required value="{{ $kursus->nama_kursus }}">
    </div>
    <div>
        <label for="nama_pembuat">Nama Pembuat:</label>
        <input type="text" id="nama_pembuat" name="nama_pembuat" required value="{{ $kursus->nama_pembuat }}">
    </div>
    <div>
        <label for="deskripsi_kursus">Deskripsi Kursus:</label>
        <textarea id="deskripsi_kursus" name="deskripsi_kursus" required>{{ $kursus->deskripsi_kursus }}</textarea>
    </div>
    <div>
        <label for="harga_kursus">Harga Kursus:</label>
        <input type="number" id="harga_kursus" name="harga_kursus" required value="{{ $kursus->harga_kursus }}">
    </div>
    <div>
        <button type="submit">Edit Kursus</button>
    </div>
</form>
@endsection