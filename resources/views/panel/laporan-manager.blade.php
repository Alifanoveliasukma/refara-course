@extends('layout')
@section('content')
    <h2>Laporan dari manager</h2>

    @foreach($laporan as $row)
        <td><strong>ID Pembeli:</strong></td>
        <td>{{ $row->peserta_id }}</td>
        <td><strong>ID kursus:</strong></td>
        <td>{{ $row->kursus_id }}</td>
        <td><strong>Total Harga:</strong></td>
        <td>{{ $row->pesananDetail->jumlah_harga }}</td>
        <br>

    @endforeach
@endsection
