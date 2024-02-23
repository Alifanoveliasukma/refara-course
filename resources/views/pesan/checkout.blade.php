@extends('layout')
@section('content')
<table>
    <thead>
        <h2>Check out</h2>
        <p>Tanggal Pesan : {{ $pesanan_info->tanggal }}</p>
        <tr>
            <th>no</th>
            <th>Nama kursus</th>
            <th>harga</th>
            <th>Total harga</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        @foreach ($pesanan as $item)
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $item->kursus->nama_kursus}}</td>
            <td align="left">Rp . {{ number_format($item->kursus->harga_kursus) }}</td>
            <td align="left">Rp . {{ number_format($item->jumlah_harga) }}</td>
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
            <td colspan="4" align="left"><strong>Total Harga :</strong></td>
            <br>
           
            <td><strong>Rp. {{ number_format($pesanan_info->jumlah_harga) }}</strong></td>
            <td>
                <form action="/stripe" method="POST">
                    <a href="/">lanjut cari kursus</a>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    
                    <input type="hidden" name="product_name" value="{{ $pesanan_info->nama_pesanan }}">
                   
                    <input type="hidden" name="quantity" value="1">
                    
                    <input type="hidden" name="price" value="{{ $pesanan_info->jumlah_harga}}">`
                    
                    
                    <button type="submit" id="checkout-live-button">Pay with stripe</button>
                </form>
            </td>
            
        </tr>
    </tbody>
</table>

@endsection