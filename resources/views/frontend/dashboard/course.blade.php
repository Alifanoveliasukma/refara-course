@extends('frontend.layout_dashboard')
@section('content')
<div class="w-[1366px] h-[607px] relative bg-white">
    <div>
        <div class="left-[162px] top-[49px] absolute text-black text-3xl font-medium font-['Roboto']">Pembalajaran Saya</div>
        <div class="pl-[27px] pr-[26px] pt-[7px] pb-2 left-[165px] top-[135px] absolute bg-neutral-500 rounded-[15px] justify-center items-center inline-flex">
            <div class="text-white text-[13px] font-light font-['Roboto']">Sedang berlangsung</div>
        </div>
        <div class="pl-[29px] pr-[27px] pt-[7px] pb-2 left-[351px] top-[135px] absolute rounded-[15px] border border-zinc-600 justify-center items-center inline-flex">
            <div class="text-neutral-700 text-[13px] font-light font-['Roboto']">Selesai</div>
        </div>
    </div>
    <div class="w-[1036px] left-[165px] top-[203px] absolute justify-start items-start gap-[52px] inline-flex">
    <div class="w-[338.92px] h-[120.39px] relative bg-white rounded-[10.12px] border border-neutral-400">
        <img class="w-[142.65px] h-[110.28px] left-[5.06px] top-[5.06px] absolute rounded-[7.08px]" src="{{ asset('storage/' .$ceksama->kursus->    image ) }}" />
        <div class="left-[164.91px] top-[17.20px] absolute text-zinc-600 text-xs font-bold font-['Inter']">{{ $ceksama->kursus->nama_kursus }} </div>
        <div class="left-[164.91px] top-[37.43px] absolute justify-center items-center gap-[7.08px] inline-flex">
            <div class="text-zinc-600 text-[10.12px] font-medium font-['Inter']">Progres</div>
            <div class="w-0.5 h-0.5 bg-zinc-600 rounded-full"></div>
            <div class="text-zinc-600 text-[10.12px] font-light font-['Inter']">1j 40m</div>
        </div>
        <div class="left-[273.16px] top-[94.09px] absolute justify-center items-center gap-[4.86px] inline-flex">
            <div class="w-[4.86px] h-[4.86px] bg-red-700 rounded-full"></div>
            <div class="text-red-700 text-[9.71px] font-medium font-['Inter']"></div>
        </div>
        <div class="px-[15px] pt-[5px] pb-1 left-[165px] top-[87.94px] absolute bg-orange-500 rounded-[5px] justify-center items-center inline-flex">
            <div class="text-white text-[10px] font-medium font-['Roboto']">Perbarui</div>
        </div>
    </div>
</div>
@endsection