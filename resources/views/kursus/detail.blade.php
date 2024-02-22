@extends('layout')
@section('content')
<table>
    <tr>
        <td><label for="nama_kursus">Nama Kursus:</label></td>
        <td><input type="text" id="nama_kursus" name="nama_kursus" required value="{{ $kursus->nama_kursus }}"></td>
    </tr>
    <tr>
        <td><label for="nama_pembuat">Nama Pembuat:</label></td>
        <td><input type="text" id="nama_pembuat" name="nama_pembuat" required value="{{ $kursus->nama_pembuat }}"></td>
    </tr>
    <tr>
        <td><label for="deskripsi_kursus">Deskripsi Kursus:</label></td>
        <td><textarea id="deskripsi_kursus" name="deskripsi_kursus" required>{{ $kursus->deskripsi_kursus }}</textarea></td>
    </tr>
    <tr>
        <td><label for="harga_kursus">Harga Kursus:</label></td>
        <td><input type="number" id="harga_kursus" name="harga_kursus" required value="{{ $kursus->harga_kursus }}"></td>
    </tr>
        <td>Jumlah pesan</td>
        <td>:</td>
        <td>
            <form action="/pesan/{{$kursus->id}}" method="post">
                @csrf 
                <input type="hidden" name="jumlah_pesan" class="form-control" required="" value="1">
                @if($data == 'true')
                     <a href="/dashboard/kursus/{{$kursus->id}}">Lanjut belajar</a>
                @elseif($data == 'false_1_belum keranjang')
                <button type="submit">Masukan keranjang - false_1</button>
                @elseif($data == 'false_2')
                <button type="submit">Masukan keranjang - false_2</button>
                @elseif($data == 'false_sudah_keranjang')
                <label>sudah masuk keranjang</label>
                @elseif($data == 'notfound')
                <button type="submit">Masukan keranjang - notfound</button>
                @endif

            </form>
        </td>
</table>

@endsection