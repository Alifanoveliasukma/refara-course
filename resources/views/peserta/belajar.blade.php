@extends('layout')
@section('content')

<ul>
    <span>Nama kursus :<a href="#diredirect-youtube"><li>{{$ceksama->kursus->nama_kursus}}</li></a></span>
    <span>pembuat: <li>{{$ceksama->kursus->nama_pembuat}}</li></span>
    <span>kategori : <li>{{$ceksama->kursus->category->nama_category}}</li></span>
</ul>


@endsection
