@extends('frontend.layout_dashboard')
@section('content')
<div class="w-[1366px] h-[1636px] relative flex-col justify-start items-start inline-flex">
    <div class="text-neutral-800 text-[34.44px] font-bold font-['Inter']  relative left-[170px] mt-10">{{$kategori->nama_category}}</div>
    <div class="text-zinc-800 text-[27.55px] relative left-[170px] font-normal font-['Inter']  ">Pelajari Dasar-dasar dan Teknik Lanjutan {{$kategori->nama_category}}</div>
    @foreach ($kursus as $item)
    <a  href="/detail-kursus-fe/{{$item->id}}">
        <div class="w-[322.69px] h-[404.61px] relative bg-white rounded-[29.97px] shadow border border-zinc-400 mt-10 left-[170px]">
            <img class="w-[309.70px] h-[207.80px] left-[5.99px] top-[6.99px] absolute rounded-[24.98px]" src="{{ asset('storage/' .$item->image ) }}" />
            <div class="left-[22.98px] top-[257.75px] absolute text-neutral-800 text-[24.98px] font-semibold font-['Inter']">{{$item->nama_kursus}}</div>
            <div class="left-[22.98px] top-[352.66px] absolute text-slate-950 text-[24.98px] font-semibold font-['Roboto']">Rp. {{ $item->harga_kursus }}</div>
            <div class="left-[23.98px] top-[300.71px] absolute justify-start items-start gap-2 inline-flex">
                <div class="justify-start items-end gap-[1.38px] flex">
                    <div class="w-[5.53px] h-[8.99px] bg-amber-500 rounded-[13.83px]"></div>
                    <div class="w-[5.53px] h-[13.14px] bg-zinc-300 rounded-[13.83px]"></div>
                    <div class="w-[5.53px] h-[17.98px] bg-zinc-300 rounded-[13.83px]"></div>
                </div>
                <div class="text-neutral-500 text-[14.99px] font-normal font-['Roboto']">{{ $item->level }}</div>
            </div>
            <div class="w-[269.74px] h-[0px] left-[25.98px] top-[338.67px] absolute border border-neutral-400"></div>
            <div class="px-[6.99px] py-[3px] left-[22.98px] top-[231.78px] absolute bg-orange-200 rounded-[5px] justify-center items-center gap-2.5 inline-flex">
                <div class="w-1.5 h-1.5 bg-amber-500 rounded-full"></div>
                <div class="text-stone-600 text-[9.99px] font-semibold font-['Roboto']">{{ $item->category->nama_category }}</div>
            </div>
        </div>
    </a>
    @endforeach

</div>
@endsection