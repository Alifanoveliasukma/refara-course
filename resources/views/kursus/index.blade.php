@extends('layout')
@section('content')
<style>
    .custom-table {
        border-collapse: collapse;
        width: 100%;
    }

    .custom-table th, .custom-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .custom-table th {
        background-color: #f2f2f2;
    }

    .action-buttons a {
        margin-right: 10px; /* Adjust the margin between action buttons */
    }
</style>
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
            <!-- Courses Table -->
            <div class="container mt-5">
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nama Kursus</th>
                            <th>Kategori</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_kursus as $item)
                        <tr>
                            <td><img src="{{ Storage::url($item->image) }}" class="img-thumbnail" style="width:50px" /></td>
                            <td>{{ $item->nama_kursus }}</td>
                            <td>{{ $item->category->nama_category }}</td>
                            <td class="action-buttons">
                                <a href="/panel/kursus/edit-kursus/{{$item->id}}">edit</a>
                                <a href="/panel/kursus/show/{{$item->id}}">show</a>
                                <form action="{{ route('kursus.delete', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Ingin Menghapus Kursus ?')">
                                        <span data-feather="trash-2"></span> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            
            <!-- Categories Table -->
                <table class="table custom-table">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Nama Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list_category as $item)
                        <tr>
                            <td><img src="{{ Storage::url($item->image) }}" class="img-thumbnail" style="width:50px" /></td>
                            <td>{{ $item->nama_category }}</td>
                            <td class="action-buttons">
                                <a href="/panel/category/edit-category/{{$item->id}}">edit</a>
                                <a href="/panel/category/show/{{$item->id}}">show</a>
                                <form action="{{ route('category.delete', $item->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="badge bg-danger border-0" type="submit" onclick="return confirm('Ingin Menghapus Category ?')">
                                        <span data-feather="trash-2"></span> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            

        @elseif(auth()->guard('user')->user()->role === 'manager')
        <div class="container mt-5">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="8"><h2>Messages</h2></th>
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
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="9"><h2>Orders</h2></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $item)
                    <tr>
                        <td><strong>Tanggal : </strong></td>
                        <td>{{ $item->pesanan->tanggal }}</td>
                        <td><strong>Nama:</strong></td>
                        <td>{{ $item->peserta->nama }}</td>
                        <td><strong>Kursus:</strong></td>
                        <td>{{ $item->kursus->nama_kursus }}</td>
                        <td><strong>Total Harga:</strong></td>
                        <td>Rp. {{ number_format($item->pesanandetail->jumlah_harga) }}</td>
                        <td>
                            @if($item->status_masa_aktif == 0)
                                <a href="/status-kursus/non-aktif/{{$item->id}}">
                                    <button type="button" class="btn btn-danger">Non aktifkan</button>
                                </a>
                            @elseif($item->status_masa_aktif == 1)
                                <a href="/status-kursus/aktif/{{$item->id}}">
                                    <button type="button" class="btn btn-primary">Aktifkan</button>
                                </a>
                            @endif
                        </td>
                        <td><strong>Aksi</strong></td>
                        <td>
                            @if($item->status_owner == 0)
                                <a href="/send-report/{{$item->id}}">
                                    <button type="button" class="btn btn-success">Kirim</button>
                                </a>
                            @elseif($item->status_owner == 1)
                                <p class="text-success">Sudah di kirim</p>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        

        @endif
    @endif

@endsection
