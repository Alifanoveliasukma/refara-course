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
{{-- section 1 --}}
    <div class="w-[1366px] h-[333px] pl-[165px] pr-[164px] pt-[19px] justify-center items-center inline-flex">
        <div class="grow shrink basis-0 self-stretch rounded-[10px] justify-center items-center inline-flex">
            <div class="grow shrink basis-0 h-[400px] justify-end items-center inline-flex">

                <div >
                    <img  src="{{ asset ('img/beranda.png') }}" />
                </div>
            </div>
        </div>
    </div>
{{-- section 2 --}}
<div class="w-[1366px] h-[606px] relative">
    <div class="left-[165px] top-[64px] absolute text-zinc-800 text-3xl font-bold font-['Inter']">Mari mulai belajar</div>
    <div class="left-[165px] top-[149px] absolute text-zinc-800 text-[25px] font-normal font-['Inter']">Kategori Kursus</div>
    <div class="w-[1036px] left-[165px] top-[203px] absolute justify-start items-start gap-[52px] inline-flex" >
        @foreach ($list_category as $item )
        <a class="w-[220px] h-80 relative bg-white rounded-[30px] shadow border border-stone-300" href="/category-fe/{{$item->nama_category}}">
            <img class="w-[206px] h-[154px] left-[7px] top-[6px] absolute rounded-[25px]" src="{{ Storage::url($item->image) }}" />
            <div class="left-[17px] top-[216px] absolute text-neutral-800 text-[15px] font-semibold font-['Inter']">{{$item->nama_category}}</div>
        </a>
        @endforeach
    </div>
</div>
</body>
@endsection
