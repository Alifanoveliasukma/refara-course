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
    </li>
    @endforeach
<br>
    @foreach($list_category as $cate)
    <li>
        fetching : <a href="/category/{{$cate->nama_category}}">{{$cate->nama_category}}</a>
    </li>

    @endforeach

    <h1>Contact Us</h1>
    @php 
    $messagewarning = Session::get('success');
    @endphp
    @if (Session::get('success'))
    <div class=" alert alert-danger">
       {{ $messagewarning }}
    </div>
    @endif
    <form action="/contact" method="post">
        @csrf
        <label for="nama">Name:</label><br>
        <input type="text" id="nama" name="nama"><br>
        <label for="no_telepon">No Telepon:</label><br>
        <input type="text" id="no_telepon" name="no_telepon"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br>
        <button type="submit">Submit</button>
    </form>
@endsection

