@extends('layout')

@section('content')
<div class="container">
    <h1>History</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Peserta</th>
                <th scope="col">Kursus</th>
                {{-- <th scope="col">Pesanan</th> --}}
                <th scope="col">Harga</th>
                <!-- Tambahkan kolom untuk informasi lainnya yang ingin Anda tampilkan -->
            </tr>
        </thead>
        <tbody>
            @foreach($history as $index => $data)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $data->pesanan->tanggal }}</td>
                <td>{{ $data->peserta->nama }}</td>
                <td>{{ $data->kursus->nama_kursus }}</td>
                {{-- <td>{{ $data->pesanan->id }}</td> --}}
                <td>Rp. {{ number_format($data->jumlah_harga) }}</td>
                <!-- Ganti 'field1', 'field2', dst. dengan nama kolom yang sesuai -->
                <!-- Jika ada relasi, Anda juga bisa mengakses properti dari relasi -->
                <!-- Contoh: $data->relasi->nama_field -->
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
