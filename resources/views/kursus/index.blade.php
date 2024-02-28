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
                <td><img src="{{ Storage::url($item->image) }}" class="img-thumbnail" style="width:50px" /></td>
                    <li>Category: {{$item->nama_category}} 
                    <a href="/panel/category/edit-category/{{$item->id}}">edit</a>
                    <a href="/panel/category/show/{{$item->id}}">show</a>
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
        <table>
            <thead>
                <tr>
                    <th colspan="4"><h2>Messages</h2></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                <tr>
                    <td><strong>Nama:</strong></td>
                    <td>{{ $contact->nama }}</td>
                    <td><strong>No Telepon:</strong></td>
                    <td>{{ $contact->no_telepon }}</td>
                    <td><strong>Email:</strong></td>
                    <td>{{ $contact->email }}</td>
                    <td><strong>Message:</strong></td>
                    <td>{{ $contact->message }}</td>
                    <td><strong>Status kursus</strong></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <table>
            <thead>
                <tr>
                    <th colspan="4"><h2>Orders</h2></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanan as $item)
                <tr>
                    <td><strong>ID Pembeli:</strong></td>
                    <td>{{ $item->id_peserta }}</td>
                    <td><strong>ID kursus:</strong></td>
                    <td>{{ $item->kursus_id }}</td>
                    <td><strong>Status:</strong></td>
                    <td>{{ $item->status }}</td>
                    <td><strong>Total Harga:</strong></td>
                    <td>{{ $item->jumlah_harga }}</td>
                    
                    <td>
                        @if($item->status_masa_aktif == 0)
                        <a href="/status-kursus/non-aktif/{{$item->id}}">
                            Non aktifkan</p>
                        </a>
                        @elseif($item->status_masa_aktif == 1)
                        <a href="/status-kursus/aktif/{{$item->id}}"><p class="badge bg-primary text-wrap bg-sm">Aktifkan</p></a><br>
                        @endif
                      </td>
                    <td><strong>Aksi</strong></td>
                    <td>
                        @if($item->status_owner == 0)
                        <a href="/send-report/{{$item->id}}">
                            Kirim</p>
                        </a>
                        @elseif($item->status_owner == 1)
                        <p>Sudah di kirim</p>
                        @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        

        @endif
    @endif

@endsection
