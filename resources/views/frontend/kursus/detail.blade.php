@extends('layout_dashboard')
@section('content')
<div class="w-[1367px] h-[1053px] relative">
    <div class="w-[687px] h-[472px] left-[165px] top-[393px] absolute rounded-[10px] border border-neutral-600">
            <div class="w-[11px] h-[314px] left-[305px] top-[3px] absolute"></div>
            <div class="w-[11px] h-[314px] left-[-8px] top-[3px] absolute"></div>
        </div>
    </div>
 
    <div class="w-[1366px] h-[360px] left-0 top-0 absolute">
        <div class="left-[165px] top-[78px] absolute text-white text-[35px] font-extrabold font-['Roboto']">{{$kursus->nama_kursus}}</div>
        <div class="left-[165px] top-[129px] absolute text-white text-xl font-normal font-['Roboto']">{{ $kursus->deskripsi_kursus }}</div>
    <div class="h-[772px] pl-[19px] pr-[18.61px] pt-[122px] pb-px left-[885px] top-[-11px] absolute flex-col justify-end items-center inline-flex">
        <div class="w-[277.39px] h-[649px] relative bg-white rounded-[26.42px] shadow flex-col justify-start items-start flex">
            <img class="w-[268.58px] h-[161.15px] rounded-tl-[22.01px] rounded-tr-[22.01px]" src="{{ asset('storage/' .$kursus->image ) }}" />
            <div class="px-[8.62px] py-[3.70px] bg-orange-200 rounded-md justify-center items-center gap-[12.32px] inline-flex">
                <div class="w-[7.39px] h-[7.39px] bg-amber-500 rounded-full"></div>
                <div class="text-stone-600 text-xs font-semibold font-['Roboto']">{{ $kursus->category->nama_category }}</div>
            </div>
            <div class="text-zinc-700 text-[22.01px] font-bold font-['Roboto']">Rp.{{ $kursus->harga_kursus }}</div>
            <div class="justify-start items-start gap-[6.64px] inline-flex">
                <div class="justify-start items-end gap-[1.15px] flex">
                    <div class="w-[4.60px] h-[7.47px] bg-amber-500 rounded-xl"></div>
                    <div class="w-[4.60px] h-[10.92px] bg-zinc-300 rounded-xl"></div>
                    <div class="w-[4.60px] h-[14.94px] bg-zinc-300 rounded-xl"></div>
                </div>
                <div class="text-neutral-500 text-xs font-normal font-['Roboto']">{{ $kursus->level }}</div>
            </div>
            <div class="pl-[54.60px] pr-[51.57px] pt-[11.45px] pb-[12.06px] bg-orange-500 rounded-[8.81px] justify-center items-center inline-flex">
                <div class="text-white text-sm font-semibold font-['Roboto']">Tambah ke keranjang</div>
            </div>
            </div>
            <div class="flex-col justify-center items-start gap-[27.30px] inline-flex">
                <div class="text-zinc-600 text-sm font-medium font-['Roboto']">Isi Kursus : </div>
                <div class="justify-center items-center gap-[5.28px] inline-flex">
                    <div class="w-[16.73px] h-[16.73px] relative"></div>
                    <div class="text-stone-500 text-xs font-light font-['Roboto']">Akses selama 2 tahun</div>
                </div>
                <div class="h-[13.21px] pb-[0.21px] justify-center items-start gap-[6.16px] inline-flex">
                    <div class="text-stone-500 text-xs font-light font-['Roboto']">{{ $kursus->durasi_kursus }}</div>
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
@endsection