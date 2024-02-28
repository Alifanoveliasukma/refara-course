@extends('layout')
@section('content')

<form action="/panel/kursus/proses-create" method="POST" enctype="multipart/form-data" >
    @csrf
    
    <div>
        <label for="nama_kursus">Nama Kursus:</label>
        <input type="text" id="nama_kursus" name="nama_kursus" required>
        @if ($errors->has('nama_kursus'))
            <span class="text-red-500">{{ $errors->first('nama_kursus') }}</span>
        @endif
    </div>
    <div>
        <label for="nama_pembuat">Nama Pembuat:</label>
        <input type="text" id="nama_pembuat" name="nama_pembuat" required>
        @if ($errors->has('nama_pembuat'))
            <span class="text-red-500">{{ $errors->first('nama_pembuat') }}</span>
        @endif
    </div>
    <div class="mb-6 ">
        <label class="block">
            <span class="text-gray-700">Select Category</span>
            <select name="category_id" class="block w-full mt-1 rounded-md">
                @foreach ($category as $category)
                <option value="{{$category->id}}">{{$category->nama_category}}</option>
                @endforeach
            </select>
        </label>
        @error('category_id')
        <div class="text-sm text-red-600">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="deskripsi_kursus">Deskripsi Kursus:</label>
        <textarea id="deskripsi_kursus" name="deskripsi_kursus" required></textarea>
        @if ($errors->has('deskripsi_kursus'))
            <span class="text-red-500">{{ $errors->first('deskripsi_kursus') }}</span>
        @endif
    </div>
    <div>
        <label for="nama_kursus">Level Kursus:</label>
        <input type="text" id="level" name="level" required>
        @if ($errors->has('level'))
            <span class="text-red-500">{{ $errors->first('level') }}</span>
        @endif
    </div>
    <div>
        <label for="durasi_kursus">Durasi Kursus:</label>
        <input type="text" id="durasi_kursus" name="durasi_kursus" required>
        @if ($errors->has('durasi_kursus'))
            <span class="text-red-500">{{ $errors->first('durasi_kursus') }}</span>
        @endif
    </div>
    <div>
        <label for="harga_kursus">Harga Kursus:</label>
        <input type="number" id="harga_kursus" name="harga_kursus" required>
        @if ($errors->has('harga_kursus'))
            <span class="text-red-500">{{ $errors->first('harga_kursus') }}</span>
        @endif
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" type="file" name="image" id="formFile">
        @if ($errors->has('image'))
            <span class="text-red-500">{{ $errors->first('image') }}</span>
        @endif
    </div>
      
        <button type="submit">Tambah Kursus</button>
    </div>
</form>
@endsection
