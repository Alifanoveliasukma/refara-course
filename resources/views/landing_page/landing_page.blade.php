@extends('landing-page')
@section('content')
    @php 
    $messagewarning = Session::get('warning');
    @endphp
    @if (Session::get('warning'))
    <div class=" alert alert-danger">
       {{ $messagewarning }}
    </div>
    @endif
    <h2>landing page</h2>
    <h4>Kumpulan course yang menarik</h4>
    @foreach ($list_kursus as $item)
    <li>Kursus: {{$item->nama_kursus}} 
    <a href="/panel/kursus/edit-kursus/{{$item->id}}">detail</a>
    <a href="#">masukan keranjang</a>
    </li>
@endforeach

@endsection

