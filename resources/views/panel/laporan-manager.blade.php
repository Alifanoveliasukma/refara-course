@extends('layout')

@section('content')
<div class="container mt-5">
    <h2>Laporan dari manager</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">Tanggal</th>
                <th scope="col">ID Pembeli</th>
                <th scope="col">ID Kursus</th>
                <th scope="col">Total Harga</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $row)
                <tr>
                    <td>{{ $row->pesanan->tanggal }}</td>
                    <td>{{ $row->peserta->nama }}</td>
                    <td>{{ $row->kursus->nama_kursus }}</td>
                    <td>Rp. {{ number_format($row->pesananDetail->jumlah_harga) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
