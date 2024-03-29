@extends('layout')
@section('content')
    <!-- List Category -->
    <h2>Kumpulan Category</h2>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
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
