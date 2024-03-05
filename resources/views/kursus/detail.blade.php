@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' .$kursus->image ) }}" alt="Gambar Kursus" class="img-fluid" style="max-height: 200px;">
        </div>
        <div class="col-md-6">
            <h2>Detail Kursus</h2>
           
                <div class="mb-3">
                    <label for="nama_kursus" class="form-label">Nama Kursus:</label>
                    <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" required value="{{ $kursus->nama_kursus }}">
                </div>
                <div class="mb-3">
                    <label for="nama_pembuat" class="form-label">Nama Pembuat:</label>
                    <input type="text" class="form-control" id="nama_pembuat" name="nama_pembuat" required value="{{ $kursus->nama_pembuat }}">
                </div>
                <div class="mb-3">
                    <label for="deskripsi_kursus" class="form-label">Deskripsi Kursus:</label>
                    <textarea class="form-control" id="deskripsi_kursus" name="deskripsi_kursus" required>{{ $kursus->deskripsi_kursus }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_kursus" class="form-label">Masa Berlaku:</label>
                    <textarea class="form-control" id="deskripsi_kursus" name="deskripsi_kursus" required>{{ $kursus->akses }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="harga_kursus" class="form-label">Harga Kursus:</label>
                    <input type="number" class="form-control" id="harga_kursus" name="harga_kursus" required value="{{ $kursus->harga_kursus }}">
                </div>
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
