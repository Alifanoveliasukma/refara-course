@extends('layout')

@section('content')
<div class="container mt-5">
    <form action="/panel/kursus/proses-create" method="POST" enctype="multipart/form-data">
        @csrf
<h2>Tambah Kursus</h2>
        <div class="mb-3">
            <label for="nama_kursus" class="form-label">Nama Kursus:</label>
            <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" required>
            @error('nama_kursus')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama_pembuat" class="form-label">Nama Pembuat:</label>
            <input type="text" class="form-control" id="nama_pembuat" name="nama_pembuat" required>
            @error('nama_pembuat')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Select Category:</label>
            <select name="category_id" class="form-select" aria-label="Select Category">
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->nama_category }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deskripsi_kursus" class="form-label">Deskripsi Kursus:</label>
            <textarea class="form-control" id="deskripsi_kursus" name="deskripsi_kursus" required></textarea>
            @error('deskripsi_kursus')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level Kursus:</label>
            <input type="text" class="form-control" id="level" name="level" required>
            @error('level')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="durasi_kursus" class="form-label">Durasi Kursus:</label>
            <input type="text" class="form-control" id="durasi_kursus" name="durasi_kursus" required>
            @error('durasi_kursus')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="akses" class="form-label">Masa Berlaku:</label>
            <input type="text" class="form-control" id="akses" name="akses" required>
            @error('akses')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="harga_kursus" class="form-label">Harga Kursus:</label>
            <input type="number" class="form-control" id="harga_kursus" name="harga_kursus" required>
            @error('harga_kursus')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Image:</label>
            <input class="form-control" type="file" name="image" id="formFile">
            @error('image')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Tambah Kursus</button>
        <a href="/panel/data" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
