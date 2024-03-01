@extends('frontend.test')
@section('content')
 <div class="mt-28 ml-44 text-neutral-700 text-[34.44px] font-bold font-inter">
    Mau belajar apa hari ini?
 </div>
 <div class="mt-0 ml-44 text-[27.55px] text-neutral-700 font-normal">
    Temukan passion dirimu sekarang juga
 </div>
 
 

<div class="mt-[118px]">
    @foreach ($kursus as $item)
    <div href="#" class=" mb-14 ml-44 h-[180px] w-[1028px] p-1 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700 flex flex-row ">
        <div class="w-[180px] h-[166px] bg-slate-200">
            <img src="{{ asset('storage/' .$item->image ) }}" alt="Gambar Kursus" class=" inset-0 w-full h-full object-cover">
        </div>
        <div>
            <p class="ml-[29px] mt-[8px] text-slate-950 text-[27.61px] font-semibold font-inter ">{{$item->nama_kursus}}</p>
            <span class="mt-[30px] ml-[29px]">{{$item->level}}</span>
        </div>
        <div>
            <p class="ml-[377px] mt-3">{{$item->category->nama_category}}</p>
            <p class="ml-[377px] mt-[58px] font-semibold text-3xl">Rp.{{$item->harga_kursus}}</p>
        </div>   
    </div>
    @endforeach 
</div> 
    
@endsection
