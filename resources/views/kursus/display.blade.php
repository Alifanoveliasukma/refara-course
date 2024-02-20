@extends('landing-page')
@section('content')
    
<h2>{{$kategori->nama_category}}</h2>
    @foreach($kursus as $a)
    {{$a->nama_kursus}}
    @endforeach


@endsection

