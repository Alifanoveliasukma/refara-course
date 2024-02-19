@extends('landing-page')
@section('content')
    @php 
    $messagewarning = Session::get('warning');
    @endphp
    @if (Session::get('warning'))
    <div class=" alert alert-danger">
       {{ $messagewarning }}
    </div>
    @endif
    <h2>landing page</h2>
    <h4>Kumpulan course yang menarik</h4>
    <p>Search Course :</p>
    <form action="/search" method="GET">
    <input type="text" name="search" placeholder="Search Course.." value="{{ old('search') }}">
    <input type="submit" value="SEARCH">
    </form>
    @foreach ($list_kursus as $item)
    <li>Kursus: {{$item->nama_kursus}} 
    <a href="/detail-kursus/{{$item->id}}">detail</a>
    </li>
@endforeach

<ul class="list-category">
    @foreach ($list_category as $item)
        <li>Category: {{$item->nama_category}}
        </li>
    @endforeach
</ul>
{{-- @foreach($list_kursus as $p)
<tr>
<td>{{ $p->nama_kursus }}</td>
<td>{{ $p->nama_pembuat }}</td>
<td>{{ $p->deskripsi_kursus }}</td>
<td>{{ $p->harga_kursus }}</td>
</tr>
@endforeach --}}

@endsection

