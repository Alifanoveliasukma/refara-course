@extends('layout')
@section('content')
<div>
    <li>
        <ul><label for="nama_kursus">Nama : {{ $kursus->nama_kursus }}</label></ul>
        <ul><label for="nama_pembuat">Pembuat : {{ $kursus->nama_pembuat }}</label></ul>
        <ul><label for="deskripsi_kursus">Deskripsi : {{ $kursus->deskripsi_kursus }}</label></ul>
        <ul><label for="harga_kursus">Harga : {{ $kursus->harga_kursus }}</label></ul>
        <ul><label for="nama_kursus">Level : {{ $kursus->level }}</label></ul>
        <ul><label for="level">Durasi : {{ $kursus->durasi_kursus }}</label></ul>
        <ul><label for="gambar">Gambar : </label><img src="{{ Storage::url($kursus->image) }}" class="img-thumbnail" style="width:100px" /></ul>
        
    </li>
</div>


@endsection
