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
    <!-- Navbar -->
    <nav class="navbar">
        <a href="/panel/kursus/list-kursus">Home</a>
        <a href="/panel/kursus/create-kursus">Create Kursus</a>
        <a href="#">halaman owner</a>
        <a href="/proses-logout-panel">logout</a>
    </nav>

    <!-- List Kursus -->
    <h2>Kumpulan Kursus</h2>
    <ul class="list-kursus">
        @foreach ($list_kursus as $item)
            <li>Kursus: {{$item->nama_kursus}} 
            <a href="/panel/kursus/edit-kursus/{{$item->id}}">edit</a>
            </li>
        @endforeach
    </ul>
</body>
</html>
