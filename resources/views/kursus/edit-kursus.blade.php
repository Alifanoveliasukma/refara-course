

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
    <form action="/panel/kursus/proses-edit/{{$kursus->id}}" method="POST">
        @csrf
        @method('PUT')
    
        <!-- Bagian lain dari formulir -->
        <div>
            <label for="nama_kursus">Nama Kursus:</label>
            <input type="text" id="nama_kursus" name="nama_kursus" required value="{{ $kursus->nama_kursus }}">
        </div>
        <div>
            <label for="nama_pembuat">Nama Pembuat:</label>
            <input type="text" id="nama_pembuat" name="nama_pembuat" required value="{{ $kursus->nama_pembuat }}">
        </div>
        <div>
            <label for="deskripsi_kursus">Deskripsi Kursus:</label>
            <textarea id="deskripsi_kursus" name="deskripsi_kursus" required>{{ $kursus->deskripsi_kursus }}</textarea>
        </div>
        <div>
            <label for="harga_kursus">Harga Kursus:</label>
            <input type="number" id="harga_kursus" name="harga_kursus" required value="{{ $kursus->harga_kursus }}">
        </div>
        <div>
            <button type="submit">Edit Kursus</button>
        </div>
    </form>
</body>
</html>

