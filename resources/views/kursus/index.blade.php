kumpulan kursus
<a href="/kursus/create-kursus">create</a>

@foreach ($list_kursus as $item)
    kursus :
    {{$item->nama_kursus}}
@endforeach