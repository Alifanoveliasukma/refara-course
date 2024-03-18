@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' .$kursus->image ) }}" alt="Gambar Kursus" class="img-fluid" style="max-height: 200px;">
        </div>
        <div class="col-md-6">
            <h2>Detail Kursus</h2>
           
            <table class="table">
                <tbody>
                    <tr>
                        <th>Nama Kursus:</th>
                        <td><p>{{ $kursus->nama_kursus }}</p></td>
                    </tr>
                    <tr>
                        <th>Nama Pembuat:</th>
                        <td><p>{{ $kursus->nama_pembuat }}</p></td>
                    </tr>
                    <tr>
                        <th>Deskripsi Kursus:</th>
                        <td><p>{{ $kursus->deskripsi_kursus }}</p></td>
                    </tr>
                    <tr>
                        <th>Durasi:</th>
                        <td><p>{{ $kursus->durasi_kursus }}</p></td>
                    </tr>
                    <tr>
                        <th>Masa Berlaku:</th>
                        <td><p>{{ $kursus->akses }}</p></td>
                    </tr>
                    <tr>
                        <th>Harga Kursus:</th>
                        <td><p>{{ $kursus->harga_kursus }}</p></td>
                    </tr>
                </tbody>
            </table>
            
                <div class="mb-3">
                    <label class="form-label">Jumlah Pesan:</label>
                    <form action="/pesan/{{$kursus->id}}" method="post">
                        @csrf 
                        <input type="hidden" name="jumlah_pesan" class="form-control" required="" value="1">
                        @if($data == 'true')
                            <a href="/dashboard/kursus/{{$kursus->id}}" class="btn btn-primary">Lanjut Belajar</a>
                        @elseif($data == 'false_1_belum keranjang')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_2')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_3')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_4')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_5')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_6')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_7')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_8')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_9')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @elseif($data == 'false_sudah_keranjang')
                            <label class="btn btn-warning">Sudah Masuk Keranjang</label>
                        @elseif($data == 'notfound')
                            <button type="submit" class="btn btn-success">Masukkan ke Keranjang</button>
                        @endif
                    </form>
                    
                </div>
      
        </div>
    </div>
</div>
@endsection
