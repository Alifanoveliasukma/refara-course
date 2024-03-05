<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpulan Kursus</title>
    <!-- Tautan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar for peserta -->
    @if(auth()->guard('peserta')->check())
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            @if (Auth::guard('peserta')->guest())
                <a class="navbar-brand" href="/">Refara</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login Peserta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/landing-page">Halaman Landing Page</a>
                        </li>
                    </ul>
                </div>
            @else
                <a class="navbar-brand" href="/">Refara</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Halaman Peserta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard/riwayat-pesanan">Riwayat Pesanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Peserta bernama:  {{ Auth::guard('peserta')->user()->nama }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/proses-logout-peserta">Logout</a>
                        </li>
                        <?php
                            $pesanan_utama = App\Models\Pesanan::where('id_peserta', Auth::user()->id)->where('status', 0)->first();

                            if ($pesanan_utama) {
                                $notif = App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                                echo '<li class="nav-item"><a class="nav-link" href="/checkout">Kursus yang masuk keranjang ' . $notif . '</a></li>';
                            } else {
                                echo '<li class="nav-item"><a class="nav-link" href="/pesan/checkout"></a></li>';
                            }
                        ?>
                    </ul>
                </div>
            @endif
        </div>
    </nav>
    @endif

    <!-- Navbar for owner -->
    @if(auth()->guard('user')->check())
        @if(auth()->guard('user')->user()->role === 'owner')
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/panel/data">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="/panel/kursus/create-kursus">Create Kursus</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/panel/category/create-category">Create Kategori</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Halaman Owner</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/proses-logout-panel">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/panel/laporan-dari-manager">Laporan dari Manager</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Anda login sebagai: {{ Auth::guard('user')->user()->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
    @endif
    
    <!-- Navbar for manager -->
    @if(auth()->guard('user')->check())
        @if(auth()->guard('user')->user()->role === 'manager')
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/panel/dashboard-panel">Home</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Halaman Manager</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/proses-logout-panel">Logout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Anda login sebagai: {{ Auth::guard('user')->user()->name }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        @endif
    @endif
    
    @yield('content')

    <!-- Tautan Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

