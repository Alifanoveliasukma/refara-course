<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpulan Kursus</title>
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
    <!-- Navbar for peserta -->
    @if(auth()->guard('peserta')->check())
    <nav class="navbar">
        @if (Auth::guard('peserta')->guest())
            <a href="{{ route('login') }}">Login Peserta</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('landing') }}">Halaman Landing Page</a>
        @else
            <a href="/">Refara</a>
            <a href="#">Halaman Peserta</a>
            {{ Auth::guard('peserta')->user()->name }}
            <a href="/proses-logout-peserta">Logout</a>
            <a href="/panel/kursus/create-kursus">Cek Fitur Owner</a>
        @endif
    </nav>
    @endif

    <!-- Navbar for user -->
    @if(auth()->guard('user')->check())
    <nav class="navbar">
        <a href="/panel/kursus/list-kursus">Home</a>
        <a href="/panel/kursus/create-kursus">Create Kursus</a>
        <a href="#">Halaman Owner</a>
        <a href="/proses-logout-panel">Logout</a>
        <a href="/panel/laporan-dari-manager">Laporan dari Manager</a>
        <a href="#">Anda login sebagai: {{ Auth::guard('user')->user()->name }}</a>
    </nav>
    @endif

    @yield('content')
</body>
</html>
