@extends('layout')
@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(Auth::guard('peserta')->user()->status_cart == 1)
    @if(Auth::guard('peserta')->user()->pesanan_id == 1)
    <h2>Kursus yang telah kamu beli</h2>
    <ul class="list-group">
        <div class="row">
        @foreach($pesanan_peserta as $a)  
        <div class="col-md-4 mb-3">
            <div class="card">
                @if($a->status_masa_aktif == 0)
                    <img src="{{ asset('storage/' . $a->kursus->image) }}" class="card-img-top" style="max-height: 100px; object-fit: cover;" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $a->kursus->nama_kursus }}</h5>
                    <p class="card-text">{{ $a->kursus->deskripsi_kursus }}</p>
                    <a href="/dashboard/kursus/{{$a->kursus->id}}" class="btn btn-primary">Belajar</a>
                    </div>
                @else
                    <img src="{{ asset('storage/' . $a->kursus->image) }}" class="card-img-top" style="max-height: 100px; object-fit: cover;" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{ $a->kursus->nama_kursus }}</h5>
                    <p class="card-text">{{ $a->kursus->deskripsi_kursus }}</p>
                    <a href="/detail-kursus/{{$a->kursus->id}}" class="btn btn-danger">Masa berlaku sudah habis</a>
                    </div>
                 @endif
            </div> 
        </div>
        @endforeach
    </div>
    </ul>
    @else
    <h2>Anda belum memesan kursus</h2>
    @endif
    @elseif(Auth::guard('peserta')->user()->pesanan_id == 1)
    <h2>Kursus yang telah kamu beli</h2>
    <ul class="list-group">
        @foreach($pesanan_peserta as $a)
        <li class="list-group-item">
            <a href="/dashboard/kursus/{{$a->kursus->id}}">{{$a->kursus->nama_kursus}}</a>
        </li>
        @endforeach
    </ul>
    @else
    <h2>Anda belum memesan kursus</h2>
    @endif
</div>
@endsection
