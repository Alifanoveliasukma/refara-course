@extends('layout')
@section('content')
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if ($pesanan && $pesanan->status == 1)

    <h2>Kursus yang telah kamu</h2>
    @foreach($list_kursus as $a)
        <li>
            {{$a->kursus->nama_kursus}}
        </li>
    @endforeach
    @elseif ($pesanan && $pesanan->status == 0)
        <div class="alert alert-info">
            belum ada kursus yang di beli
        </div>
    @else
        <h2>Tidak ada pesanan yang ditemukan</h2>
    @endif

@endsection

