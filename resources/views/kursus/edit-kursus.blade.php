@extends('layout')

@section('content')
<div class="container mt-5">
    <form action="/panel/kursus/proses-edit/{{$kursus->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_kursus" class="form-label">Nama Kursus:</label>
            <input type="text" class="form-control" id="nama_kursus" name="nama_kursus" required value="{{ $kursus->nama_kursus }}">
        </div>
        <div class="mb-3">
            <label for="nama_pembuat" class="form-label">Nama Pembuat:</label>
            <input type="text" class="form-control" id="nama_pembuat" name="nama_pembuat" required value="{{ $kursus->nama_pembuat }}">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Select Category:</label>
            <select name="category_id" class="form-select" aria-label="Select Category">
                @foreach ($category as $cat)
                    <option value="{{ $cat->id }}" @if($cat->id == $kursus->category_id) selected @endif>
                        {{ $cat->nama_category }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="deskripsi_kursus" class="form-label">Deskripsi Kursus:</label>
            <textarea class="form-control" id="deskripsi_kursus" name="deskripsi_kursus" required>{{ $kursus->deskripsi_kursus }}</textarea>
        </div>
        <div class="mb-3">
            <label for="level" class="form-label">Level Kursus:</label>
            <input type="text" class="form-control" id="level" name="level" required value="{{ $kursus->level }}">
        </div>
        <div class="mb-3">
            <label for="durasi_kursus" class="form-label">Durasi Kursus:</label>
            <input type="text" class="form-control" id="durasi_kursus" name="durasi_kursus" required value="{{ $kursus->durasi_kursus }}">
        </div>
        <div class="mb-3">
            <label for="harga_kursus" class="form-label">Harga Kursus:</label>
            <input type="number" class="form-control" id="harga_kursus" name="harga_kursus" required value="{{ $kursus->harga_kursus }}">
        </div>
        <div class="mb-3">
            <label for="current_image" class="form-label">Pilih Gambar Kursus:</label><br>
            <img src="{{ Storage::url($kursus->image) }}" class="img-thumbnail" style="width:100px" /><br>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Edit Kursus</button>
            <a href="/panel/data" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>
@endsection
