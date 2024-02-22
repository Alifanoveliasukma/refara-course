@extends('layout')
@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if(Auth::guard('peserta')->user()->status_cart == '1')
    @if(Auth::guard('peserta')->user()->pesanan_id == 1)
        <h2>Kursus yang telah kamu beli</h2>
        @foreach($pesanan_peserta as $a)
            <li>
                <a href="/dashboard/kursus/{{$a->kursus->id}}">{{$a->kursus->nama_kursus}}</a>
            </li>
        @endforeach
    @else
        <p>Anda belum memesan kursus - kondisi sudah tambah cart</p>
    @endif
    @elseif(Auth::guard('peserta')->user()->pesanan_id == 1)
        <h2>Kursus yang telah kamu beli</h2>
        @foreach($pesanan_peserta as $a)
            <li>
                <a href="/dashboard/kursus/{{$a->kursus->id}}">{{$a->kursus->nama_kursus}}</a>
            </li>
        @endforeach
    @else
        <p>Anda belum memesan kursus - kondisi belum tambah cart</p>
    @endif

  

@endsection
