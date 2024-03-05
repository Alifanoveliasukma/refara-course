
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
    @if (Auth::guard('peserta')->guest())
        <div class="w-[1366px] h-[78px] relative bg-white shadow">        
            <div class="left-[523px] top-[30.50px] absolute justify-center items-center gap-9 inline-flex">
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Home</a>
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Courses</a>
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Teachers</a>
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Contact</a>
            </div>
            <div class="left-[1045px] top-[18px] absolute justify-center items-center gap-3.5 inline-flex">
                <a class="text-neutral-700 text-lg font-bold font-['Roboto']" href="{{ route('login') }}">Login</a>
                <div class="px-[14.43px] py-[10.82px] bg-orange-600 rounded-[21.64px] justify-center items-center gap-[7.21px] flex">
                    <a class="text-white text-lg font-bold font-['Roboto']" href="/register">Register</a>
                </div>
            </div>
            <img class="w-[153px] h-[50px] left-[155px] top-[14px] absolute" src="{{ asset ('assets/refaraLogo.png') }}" />
        </div>
    @else
        <div class="w-[1366px] h-[100px] relative bg-white shadow">   
          <a class="left-[167px] top-[79px] absolute text-black text-xs font-light font-['Roboto']" href="/beranda" >Beranda</a>
          <a class="left-[262px] top-[79px] absolute text-black text-xs font-light font-['Roboto']" >Pembelajaran saya</a>     
            <div class="left-[523px] top-[30.50px] absolute justify-center items-center gap-9 inline-flex">
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Home</a>
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Courses</a>
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Teachers</a>
                <a class="text-black text-[15px] font-normal font-['Roboto']" href="#">Contact</a>
            </div>
            <div class="left-[1045px] top-[18px] absolute justify-center items-center gap-3.5 inline-flex">
                <div href="#">{{ Auth::guard('peserta')->user()->nama }}</div>
                <div class="px-[14.43px] py-[10.82px] bg-orange-600 rounded-[21.64px] justify-center items-center gap-[7.21px] flex">
                    <a href="/proses-logout-peserta">Logout</a>
                </div>
                <div class="">
                    @if(Auth::guard('peserta')->check() && Auth::guard('peserta')->user()->status_cart == '1')
                        <?php
                        $pesanan_utama = App\Models\Pesanan::where('id_peserta', Auth::guard('peserta')->user()->id)->where('status', 0)->first();

                        if ($pesanan_utama) {
                            $notif = App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            echo '<a href="/checkout-fe"> <img  src="assets/cart.png" /><span> ' . $notif . '</span></a>';
                        } else {
                            echo '<a href="/pesan/checkout"></a>';
                        }
                        ?>
                    @endif
                </div>
            </div>
            <img class="w-[153px] h-[50px] left-[155px] top-[14px] absolute" src="{{ asset ('assets/refaraLogo.png') }}" />
        </div>
    @endif
    @yield('content')
</body>
</html>

