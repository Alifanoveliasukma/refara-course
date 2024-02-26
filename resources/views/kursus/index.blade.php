@extends('layout')
@section('content')
    <!-- List Kursus -->
    @if(auth()->guard('user')->check())
        @if(auth()->guard('user')->user()->role === 'owner')
            <h2>Kumpulan Kursus</h2>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div><p>
            @endif
            @if (session()->has('notif.success'))
                <div class="alert alert-success">
                    {{ session('notif.success') }}
                </div>
            @endif

            <ul class="list-kursus">
                @foreach ($list_kursus as $item)
                <th>Image</th>
                <td><img src="{{ Storage::url($item->image) }}" class="img-thumbnail" style="width:50px" /></td>
                    <li>Kursus: {{$item->nama_kursus}} <span>kategori : {{$item->category->nama_category}}</span>
                    <a href="/panel/kursus/edit-kursus/{{$item->id}}">edit</a>
                    <a href="/panel/kursus/show/{{$item->id}}">show</a>
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

        @elseif(auth()->guard('user')->user()->role === 'manager')
            <h2>Massage</h2>
            @foreach ($contacts as $contact)
                    <li>
                        <strong>Nama:</strong> {{ $contact->nama }} <br>
                        <strong>No Telepon:</strong> {{ $contact->no_telepon }} <br>
                        <strong>Email:</strong> {{ $contact->email }} <br>
                        <strong>Message:</strong> {{ $contact->message }} <br>
                    </li>
                @endforeach
            <h2>Pesanan</h2>
            @foreach ($pesanan as $item)
                    <li>
                        <strong>ID Pembeli:</strong> {{ $item->id_peserta }} <br>
                        <strong>ID kursus:</strong> {{ $item->kursus_id }} <br>
                        <strong>Status:</strong> {{ $item->status }} <br>
                        <strong>Total Hara:</strong> {{ $item->jumlah_harga}} <br>
                    </li>
            @endforeach

            

        @endif
    @endif

@endsection
