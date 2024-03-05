@extends('layout')

@section('content')
<div class="container mt-5">
    <h3>Detail</h3>
    <table class="table">
        <tbody>
            <tr>
                <th scope="row">Nama</th>
                <td>{{ $kursus->nama_kursus }}</td>
            </tr>
            <tr>
                <th scope="row">Pembuat</th>
                <td>{{ $kursus->nama_pembuat }}</td>
            </tr>
            <tr>
                <th scope="row">Deskripsi</th>
                <td>{{ $kursus->deskripsi_kursus }}</td>
            </tr>
            <tr>
                <th scope="row">Harga</th>
                <td>{{ $kursus->harga_kursus }}</td>
            </tr>
            <tr>
                <th scope="row">Level</th>
                <td>{{ $kursus->level }}</td>
            </tr>
            <tr>
                <th scope="row">Durasi</th>
                <td>{{ $kursus->durasi_kursus }}</td>
            </tr>
            <tr>
                <th scope="row">Gambar</th>
                <td><img src="{{ Storage::url($kursus->image) }}" class="img-thumbnail" style="width:100px" /></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
