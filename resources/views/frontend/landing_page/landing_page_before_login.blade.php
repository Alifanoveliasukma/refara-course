@extends('frontend.test')
@section('content')
{{-- section 1 --}}
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
{{-- section 2 --}}
<div class="w-full h-[645px] pl-[156px] pr-[157px] pt-[106px] pb-6 bg-white flex-col justify-end items-center gap-[61px] inline-flex">
    <div class="w-[695px] h-[161px] relative flex-col justify-center items-center flex">
        <div class="text-center text-orange-400 text-[25px] font-bold font-['Roboto'] relative h-32 w-32">Choose Us</div>
        <div class="text-black text-[40px] font-medium font-['Roboto']">Investasikan Karir Anda Bersama Kami</div>
        <div class="w-[664px] h-[35px] text-center text-black text-[23px] font-normal font-['Roboto']">Kursus-Kursus Terbaik yang Akan Membantu Anda Berkembang dan Sukses di Dunia Kerja</div>
    </div>
    <div>
        <div class="w-[1053px] h-[293px] justify-center items-center gap-[66px] inline-flex">
            <img class="w-[307px] h-[293px] relative  rounded-[20px]" src="{{ asset ('img/choose1.png') }} " />
            <img class="w-[307px] h-[293px] relative  rounded-[20px]" src="{{ asset ('img/choose2.png') }}" />
            <img class="w-[307px] h-[293px] relative  rounded-[20px]" src="{{ asset ('img/choose3.png') }}" />

        </div>
    </div>
</div>
{{-- section 3 --}}
<div class=" h-[929px] relative">
    <img class="w-[100%]" src="{{ asset ('assets/bg.png') }} " />
    <div>
        <div class="left-[166px] top-[344px] absolute justify-start items-start gap-8 inline-flex">
            @foreach ($kursus as $item )
            <a class="w-[323px] h-[405px] relative bg-white rounded-[30px] shadow" href="/detail-kursus/{{$item->id}}">
                <img class="w-[310px] h-52 left-[6px] top-[7px] absolute rounded-[25px]" src="{{ asset('storage/' .$item->image ) }}" />
                <td><div class="left-[23px] top-[259px] absolute text-slate-950 text-[25px] font-semibold font-['Roboto'] ">{{$item->nama_kursus}}</div></td>
                <div class="left-[23px] top-[353px] absolute text-slate-950 text-[25px] font-semibold font-['Roboto']">{{ $item->harga_kursus }}</div>
                <div class="left-[24px] top-[301px] absolute justify-start items-start gap-2 inline-flex">
                    <div class="justify-start items-end gap-[1.38px] flex">
                        <div class="w-[5.54px] h-[9px] bg-amber-500 rounded-[13.85px]"></div>
                        <div class="w-[5.54px] h-[13.15px] bg-zinc-300 rounded-[13.85px]"></div>
                        <div class="w-[5.54px] h-[18px] bg-zinc-300 rounded-[13.85px]"></div>
                    </div>
                    <div class="text-neutral-500 text-[15px] font-normal font-['Roboto']">{{ $item->level }}</div>
                </div>
                <div class="w-[270px] h-[0px] left-[26px] top-[339px] absolute border border-neutral-400"></div>
                <div class="px-[7px] py-[3px] left-[23px] top-[232px] absolute bg-orange-200 rounded-[5px] justify-center items-center gap-2.5 inline-flex">
                    <div class="w-1.5 h-1.5 bg-amber-500 rounded-full"></div>
                    <div class="text-stone-600 text-[10px] font-semibold font-['Roboto']">{{ $item->category->nama_category }}</div>
                </div>
            </a>
            @endforeach
        </div>
        <div class="h-[191px] pl-[18px] pr-[17px] pt-5 left-[383px] top-[112px] absolute flex-col justify-end items-center gap-[94px] inline-flex">
            <a class="text-white text-[25px] font-bold font-['Roboto']">Search Courses</a>
            <div class="w-[564px] h-12 text-center text-white text-xl font-medium font-['Roboto']">Jelajahi Dengan Mudah Berbagai Pilihan Kursus dan Temukan yang Sesuai dengan Tujuan Karir Anda</div>
        </div>  
        <form action="/search" method="GET">
            <div class="left-[383px] top-[182px] absolute justify-center items-center gap-[11px] inline-flex">
                <div class="pl-[33px] pr-[167px] py-2.5 bg-white rounded-[10px] border border-black border-opacity-40 justify-start items-center gap-[15.51px] flex">
                    <input class=" w-[352.83px]  text-zinc-600 text-xl font-normal font-['Roboto']" type="text" name="search" placeholder="Search Course.." value="{{ old('search') }}"></input>                </div>
                <div class="pl-[22px] pr-5 py-2.5 rounded-[10px] border-2 border-white justify-center items-center flex">
                    <input class="text-white text-xl font-medium font-['Roboto']" input type="submit" value="SEARCH" ></div>
                </div>
            </div>
            
        <form>
            
    </div>
</div>
@endsection
