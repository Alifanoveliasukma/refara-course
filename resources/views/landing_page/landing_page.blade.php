@extends('landing-page')
@section('content')
<div class="container">
    @php 
    $messagewarning = Session::get('warning');
    @endphp
    @if (Session::get('warning'))
    <div class="alert alert-danger">
       {{ $messagewarning }}
    </div>
    @endif
    <h2>Landing Page</h2>

    <p>Search Course:</p>
    <form action="/search" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search Course.." value="{{ old('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    <h3>List of Courses:</h3>
    <ul class="list-group mb-3">
        @foreach ($kursus as $item)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $item->nama_kursus }}
            <a href="/detail-kursus/{{$item->id}}" class="btn btn-sm btn-primary">Detail</a>
        </li>
        @endforeach
    </ul>

    <h3>List of Categories:</h3>
    <ul class="list-group mb-3">
        @foreach($list_category as $cate)
        <li class="list-group-item">
            Fetching: <a href="/category/{{$cate->nama_category}}">{{$cate->nama_category}}</a>
        </li>
        @endforeach
    </ul>

    <h1>Contact Us</h1>
    @php 
    $messagewarning = Session::get('success');
    @endphp
    @if (Session::get('success'))
    <div class="alert alert-success">
       {{ $messagewarning }}
    </div>
    @endif
    <form action="/contact" method="post" class="mb-3">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label">Name:</label>
            <input type="text" class="form-control" id="nama" name="nama">
        </div>
        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon:</label>
            <input type="text" class="form-control" id="no_telepon" name="no_telepon">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">Message:</label>
            <textarea class="form-control" id="message" name="message" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
