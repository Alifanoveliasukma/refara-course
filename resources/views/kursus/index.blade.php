@extends('layout')
@section('content')
    <!-- List Kursus -->
    <h2>Kumpulan Kursus</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <ul class="list-kursus">
        @foreach ($list_kursus as $item)
            <li>Kursus: {{$item->nama_kursus}} 
            <a href="/panel/kursus/edit-kursus/{{$item->id}}">edit</a>
            <form action="{{ route('kursus.delete', $item->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Ingin Menghapus Kursus ?')">
                    <span data-feather="trash-2"></span> Hapus
                </button>
            </form>
            </li>
        @endforeach
    </ul>
    <ul class="list-category">
        @foreach ($list_category as $item)
            <li>Category: {{$item->nama_category}} 
            <a href="/panel/category/edit-category/{{$item->id}}">edit</a>
            <form action="{{ route('category.delete', $item->id) }}" method="post" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Ingin Menghapus Category ?')">
                    <span data-feather="trash-2"></span> Hapus
                </button>
            </form>
            </li>
        @endforeach
    </ul>
@endsection
