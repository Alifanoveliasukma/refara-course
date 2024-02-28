@extends('frontend.test')
@section('content')
<div class="w-[1366px] h-[790px] relative bg-gradient-to-r from-orange-100 to-orange-300 w-screen">
    <img class="w-[563px] h-[682px] left-[764px] top-[75px] absolute" src="{{ asset ('img/orang-landingpage.png') }}" />
    <div class="h-[272px] left-[164px] top-[222px] absolute flex-col justify-center items-start inline-flex">
        <div class="w-[591px] h-[173px] text-slate-900 text-[65px] font-black font-['Roboto'] tracking-wide">Kursus Bekualitas <br/>Untuk Karir Terbaik</div>
        <div class="w-[571px] h-[99px] text-neutral-600 text-xl font-medium font-['Roboto'] leading-normal">Investasikan waktu Anda pada kursus yang memberikan hasil langsung, membantu Anda mencapai tujuan belajar Anda dengan cepat dan efektif.</div>
    </div>
    <div class="pl-[13.63px] pr-[15.63px] pt-[12.78px] pb-[13.23px] left-[164px] top-[510.84px] absolute bg-orange-600 rounded-xl justify-center items-center gap-[7.42px] inline-flex">
        <a class="text-white text-[17.04px] font-bold font-['Roboto'] leading-tight" href="/register">Get Started</a>
    </div>
    <div class="w-[1366px] h-[99px] left-0 top-[691px] absolute">
        <div class="w-[1366px] h-[99px] left-0 top-0 absolute bg-white shadow  w-screen"></div>
        <div class="left-[175px] top-[18px] absolute justify-center items-center gap-[104px] inline-flex">
            <img class="w-[124px] h-[42px]" src="{{ asset ('img/google.png') }}" />
            <img class="w-[120.33px] h-[44.93px]" src="{{ asset ('img/gundar.png') }}" />
            <img class="w-[166px] h-[25px]" src="{{ asset ('img/dki.png') }}" />
            <img class="w-[114px] h-16" src="{{ asset ('img/tokopedia.png') }}" />
            <img class="w-[76px] h-[31px]" src="{{ asset ('img/goto.png') }}" />
        </div>
    </div>
</div>
@endsection
