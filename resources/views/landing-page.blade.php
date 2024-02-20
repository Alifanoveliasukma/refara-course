<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        /* CSS untuk Navbar */
        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
        }
        /* CSS untuk List */
        .list-kursus {
            list-style-type: none;
            padding: 0;
        }
        .list-kursus li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    
    <nav class="navbar">
        @if (Auth::guard('peserta')->guest())
            <a href="/">Refara</a>
            <a href="{{ route('login') }}">Login Peserta</a>
            <a href="/register">Register</a>
            <a href="/landing-page">Halaman Landing Page</a>
        @else
            <a href="/">Refara</a>
            <a href="/dashboard">Halaman Peserta</a>
            <a href="#">Peserta bernama:  {{ Auth::guard('peserta')->user()->nama }}</a>
            <a href="/proses-logout-peserta">Logout</a>
            @if(Auth::guard('peserta')->check() && Auth::guard('peserta')->user()->status_cart == '1')
            <?php
                $pesanan_utama = App\Models\Pesanan::where('id_peserta', Auth::guard('peserta')->user()->id)->where('status', 0)->first();

                if ($pesanan_utama) {
                    $notif = App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                    echo '<a href="/checkout">kursus yang masuk keranjang ' . $notif . '</a>';
                } else {
                    echo '<a href="/pesan/checkout"></a>';
                }
                ?>
            @endif
        @endif
    </nav>

    @yield('content')
</body>
</html>
