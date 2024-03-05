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
    <script src="https://kit.fontawesome.com/be4ae51df5.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w-full h-[811px] relative bg-stone-50 flex-col justify-start items-start inline-flex">
        <div class="w-[1366px] h-[811px] relative bg-stone-50 flex-col justify-start items-start inline-flex">
            {{-- Ringkasan --}}
            <div class="w-[277.39px] h-[200px] relative bg-white rounded-[26.42px] shadow flex-col justify-start items-start inline-flex left-[1000px] top-[100px]">
                   <div class="w-[277px] h-[202px] relative bg-white rounded-[25px] shadow flex-col justify-start items-start flex">
                        <div class="text-black text-xl font-medium font-['Roboto'] ml-3 mt-4">Ringkasan</div>
                        <div class="justify-center items-start gap-[115px] inline-flex mt-5">
                            <div class="text-zinc-600 text-[15px] font-normal font-['Roboto'] ml-3">Total</div>
                            <div class="text-zinc-600 text-[15px] font-normal font-['Roboto']"><td><strong>Rp. {{ number_format($pesanan_info->jumlah_harga) }}</strong></td></div>
                        </div>
                        <div class="w-[207px] pl-[72px] pr-[71px] pt-[11px] pb-2.5 bg-orange-500 rounded-[10px] justify-center items-center inline-flex mt-10 ml-9">
                            <div class="text-white text-[15px] font-semibold font-['Roboto']"><tr>
                                <td>
                                    <form action="/stripe" method="POST">
                                        
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        
                                        <input type="hidden" name="product_name" value="{{ $pesanan_info->nama_pesanan }}">
                                       
                                        <input type="hidden" name="quantity" value="1">
                                        
                                        <input type="hidden" name="price" value="{{ $pesanan_info->jumlah_harga}}">
                                        
                                        
                                        <button type="submit" id="checkout-live-button">Bayar</button>
                                    </form>
                                </td>
                                
                            </tr></div>
                        </div>
                    </div>
            </div>
            {{-- Keranjang --}}
            <div class="mt-1 ml-40">
                <h1 class="text-black text-3xl font-medium font-['Roboto'] my-0">Keranjang</h1>
                @foreach ($pesanan as $item)
                <div class="w-[737px] h-[110px] relative bg-white shadow mt-4">
                                    <img class="w-[78px] h-[78px] left-[114px] top-[16px] absolute rounded-[10px]" src="{{ asset('storage/' .$item->kursus->image ) }}" />
                    <div class="left-[212px] top-[27px] absolute text-black text-[15px] font-semibold font-['Roboto']">{{ $item->kursus->nama_kursus}}</div>
                    <div class="left-[558px] top-[46px] absolute text-neutral-700 text-[15px] font-semibold font-['Roboto']">Rp . {{ number_format($item->kursus->harga_kursus) }}</div>
                    <div class="ml-2 absolute top-[46px] right-9">
                        <form action="/checkout-delete/{{$item->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><i class="fa-regular fa-trash-can"></i></button>
                        </form>
                    </div>
                    <div class="left-[212px] top-[62px] absolute justify-start items-start gap-[7.54px] inline-flex">
                        <div class="justify-start items-end gap-[1.31px] flex">
                            <div class="w-[5.22px] h-[8.48px] bg-amber-500 rounded-[13.05px]"></div>
                            <div class="w-[5.22px] h-[12.40px] bg-zinc-300 rounded-[13.05px]"></div>
                            <div class="w-[5.22px] h-[16.97px] bg-zinc-300 rounded-[13.05px]"></div>
                        </div>
                        <div class="text-neutral-500 text-sm font-normal font-['Roboto']">{{ $item->kursus->level }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
@endsection