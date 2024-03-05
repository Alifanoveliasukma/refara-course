@extends('layout')
@section('content')
<div class="container">
    <ul class="list-group">
        <li class="list-group-item">
            <span>Nama kursus :</span>
            <a href="#diredirect-youtube" class="ml-2">{{ $ceksama->kursus->nama_kursus }}</a>
        </li>
        <li class="list-group-item">
            <span>Pembuat :</span>
            {{ $ceksama->kursus->nama_pembuat }}
        </li>
        <li class="list-group-item">
            <span>Kategori :</span>
            {{ $ceksama->kursus->category->nama_category }}
        </li>
    </ul>
</div>
@endsection
