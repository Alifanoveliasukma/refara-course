@extends('landing-page')
@section('content')
<div class="container">
    <h2 class="mb-4">{{$kategori->nama_category}}</h2>
    <div class="row">
        @foreach($kursus as $kursus)
        <div class="col-md-4 mb-3">
            <div class="card">
                <img src="{{ asset('storage/' . $kursus->image) }}" class="card-img-top" style="max-height: 100px; object-fit: cover;" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $kursus->nama_kursus }}</h5>
                    <p class="card-text">Deskripsi : {{ $kursus->deskripsi_kursus }}</p>
                    <a href="/detail-kursus/{{$kursus->id}}" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
