@extends('layout')
@section('content')
<table>
    <thead>
        <tr>
            <th>no</th>
            <th>Nama kursus</th>
            <th>jumlah</th>
            <th>harga</th>
            <th>Total harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($pesanan_details as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $item->kursus->nama_kursus}}</td>
            <td>{{ $item->jumlah}} kursus</td>
            <td>Rp . {{ number_format($item->kursus->harga_kursus) }}</td>
            <td>Rp . {{ number_format($item->jumlah_harga) }}</td>
            <td>
                <form action="/checkout-delete/{{$item->id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" >delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        <tr>
            <td colspan="4"></td>
            <td>Rp. {{ number_format($pesanan->jumlah_harga)}}</td>
        </tr>
    </tbody>
</table>

@endsection