@extends('frontend.layout_dashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <script src="{{ asset('js/app.js') }}"></script>
<div class="w-[1367px] h-[1053px] relative">
    <div class="w-[687px] h-[472px] left-[165px] top-[393px] absolute rounded-[10px] ">
            <div class="w-[11px] h-[314px] left-[305px] top-[3px] absolute"></div>
            <div class="w-[11px] h-[314px] left-[-8px] top-[3px] absolute"></div>
        </div>
    </div>
    <div class="w-full h-[360px] left-0 top-0 absolute mt-[100px]">
        <img class="w-full h-[360px] absolute " src="{{ asset ('assets/header.png') }}">
            <div class="left-[165px] top-[78px] absolute text-white text-[35px] font-extrabold font-['Roboto']">{{$kursus->nama_kursus}}</div>
            <div class="left-[165px] top-[129px] absolute text-white text-xl font-normal font-['Roboto']">{{ $kursus->deskripsi_kursus }}</div>
        <div class="w-[277.39px] h-[649px] relative bg-white rounded-[26.42px] shadow flex-col justify-start items-start inline-flex left-[1000px] top-[100px]">
            <img class="w-[268.58px] h-[161.15px] mx-1 my-1 rounded-tl-[22.01px] rounded-tr-[22.01px] rounded" src="{{ asset('storage/' .$kursus->image ) }}"/>
            <div class="px-[8.62px] py-[3.70px] bg-orange-200 rounded-md justify-center items-center gap-[12.32px] inline-flex ">
                <div class="w-[7.39px] h-[7.39px] bg-amber-500 rounded-full"></div>
                <div class="text-stone-600 text-xs font-semibold font-['Roboto'] ">{{ $kursus->category->nama_category }}</div>
            </div>
            <div class="text-zinc-700 text-[22.01px] font-bold font-['Roboto'] mx-2 my-2">Rp120.000</div>
            <div class="text-neutral-500 text-xs font-normal font-['Roboto'] mx-3 my-3  ">Beginner</div>
            <div class="pl-[54.60px] pr-[51.57px] pt-[11.45px] pb-[12.06px] bg-orange-500 rounded-[8.81px] justify-center items-center inline-flex mx-3 my-3">
                <div class="text-white text-sm font-semibold font-['Roboto'] ">
                    <form action="/pesan/{{$kursus->id}}" method="post">
                        @csrf 
                        <input type="hidden" name="jumlah_pesan" class="form-control" required="" value="1">
                        @if($data == 'true')
                             <a href="/dashboard/kursus/{{$kursus->id}}">Lanjut belajar</a>
                        @elseif($data == 'false_1_belum keranjang')
                        <button type="submit">Masukan keranjang </button>
                        @elseif($data == 'false_2')
                        <button type="submit">Masukan keranjang </button>
                        @elseif($data == 'false_3')
                        <button type="submit">Masukan keranjang </button>
                        @elseif($data == 'false_4')
                        <button type="submit">Masukan keranjang </button>
                        @elseif($data == 'false_5')
                        <button type="submit">Masukan keranjang </button>
                        @elseif($data == 'false_6')
                        <button type="submit">Masukan keranjang </button>
                        @elseif($data == 'false_sudah_keranjang')
                        <label>sudah masuk keranjang</label>
                        @elseif($data == 'notfound')
                        <button type="submit">Masukan keranjang - notfound</button>
                        @endif
        
                    </form>
                </div>
            </div>
            <div class="w-[151.45px] h-[188.72px] flex-col justify-center items-start gap-[27.30px] inline-flex mx-3">
                <div class="text-zinc-600 text-sm font-medium font-['Roboto']">Isi Kursus : </div>
                <div class="justify-center items-center gap-[5.28px] inline-flex">
                </div>
                <div class="h-[13.21px] pb-[0.21px] justify-center items-start gap-[6.16px] inline-flex">
                <div class="text-stone-500 text-xs font-light font-['Roboto']">Video Berdurasi {{ $kursus->durasi_kursus }}</div>
                </div>
                <div class="h-[19.37px] pr-[0.21px] justify-center items-center gap-[7.93px] inline-flex">
                <div class="text-stone-500 text-xs font-light font-['Roboto']">Akses di perangkat seluler</div>
                </div>
                <div class="h-[13.21px] pb-[0.21px] justify-center items-start gap-[5.28px] inline-flex">
                <div class="text-stone-500 text-xs font-light font-['Roboto']">Subtitle berbagai Bahasa</div>
                </div>
                </div>

        </div>
        

    </div>
</div>
</body>

@endsection

