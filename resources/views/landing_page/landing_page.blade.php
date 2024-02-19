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

<p>Search Course :</p>
 <form action="/search" method="GET">
 <input type="text" name="search" placeholder="Search Course.." value="{{ old('search') }}">
 <input type="submit" value="SEARCH">
 </form>

 @foreach ($kursus as $item)
 <li>Kursus: {{$item->nama_kursus}} 
 <a href="/detail-kursus/{{$item->id}}">detail</a>
 <a href="#">masukan keranjang</a>
 </li>
@endforeach
@endsection

