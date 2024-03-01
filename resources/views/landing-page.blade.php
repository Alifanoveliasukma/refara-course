<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Tautan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            @if (Auth::guard('peserta')->guest())
                <a class="navbar-brand" href="/">Refara</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="{{ route('login') }}">Login Peserta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/landing-page">Halaman Landing Page</a>
                        </li>
                    </ul>
                </div>
            @else
                <a class="navbar-brand" href="/">Refara</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/dashboard">Halaman Peserta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="#">Peserta bernama:  {{ Auth::guard('peserta')->user()->nama }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="/proses-logout-peserta">Logout</a>
                        </li>
                        @if(Auth::guard('peserta')->check() && Auth::guard('peserta')->user()->status_cart == '1')
                            <?php
                                $pesanan_utama = App\Models\Pesanan::where('id_peserta', Auth::guard('peserta')->user()->id)->where('status', 0)->first();

                                if ($pesanan_utama) {
                                    $notif = App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                                    echo '<li class="nav-item"><a class="nav-link text-dark" href="/checkout">kursus yang masuk keranjang ' . $notif . '</a></li>';
                                } else {
                                    echo '<li class="nav-item"><a class="nav-link text-dark" href="/pesan/checkout"></a></li>';
                                }
                            ?>
                        @endif
                    </ul>
                </div>
            @endif
        </div>
    </nav>
@yield('content')
    <!-- Tautan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
