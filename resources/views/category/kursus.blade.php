@extends('layout')
@section('content')
    
    <h2>{{ $category->nama_category }}</h2>
    @foreach ($kursus as $item)
        <li> {{$item->nama_kursus}}</li>
    @endforeach   

@endsection
