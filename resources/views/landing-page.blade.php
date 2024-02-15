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
            <a href="{{ route('login') }}">Login Peserta</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="#">Halaman Landing Page</a>
        @else
            <a href="/dashboard">Home</a>
            <a href="#">Halaman Peserta</a>
            {{ Auth::guard('peserta')->user()->name }}
            <a href="/proses-logout-peserta">Logout</a>
            <a href="/panel/kursus/create-kursus">Cek Fitur Owner</a>
        @endif
    </nav>

    @yield('content')
</body>
</html>
