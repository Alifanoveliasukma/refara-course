@extends('layout')
@section('content')
<div class="container">
    <h2>Check out</h2>
    @if ($pesanan->isEmpty())
        <p>Belum ada pesanan.</p>
        <a href="/" class="btn btn-primary">Lanjut cari kursus</a>
    @else
    <p>Tanggal Pesan : {{ $pesanan_info->tanggal }}</p>
    <a href="/" class="btn btn-primary">Lanjut cari kursus</a>
    <table class="table">
        <thead>
            <tr>
                <th>no</th>
                <th>Nama kursus</th>
                <th>Harga</th>
                <th>Total harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            @foreach ($pesanan as $item)
            <tr>
                <td>{{$no++}}</td>
                <td>{{ $item->kursus->nama_kursus}}</td>
                <td>Rp. {{ number_format($item->kursus->harga_kursus) }}</td>
                <td>Rp. {{ number_format($item->jumlah_harga) }}</td>
                <td>
                    <form action="/checkout-delete/{{$item->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total Harga :</strong></td>
                <td><strong>Rp. {{ number_format($pesanan_info->jumlah_harga) }}</strong></td>
                <td>
                    <form action="/stripe" method="POST">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="product_name" value="{{ $pesanan_info->nama_pesanan }}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="hidden" name="price" value="{{$pesanan_info->jumlah_harga}}">
                        <button type="submit" class="btn btn-success">Pay with stripe</button>
                    </form>

                </td>
            </tr>
        </tbody>
    </table>
    @endif
</div>
@endsection