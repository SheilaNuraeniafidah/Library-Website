<?php
    session_start();
    include "koneksi.php"; 

    $query_total_buku = "SELECT SUM(jumlah) AS total_buku FROM buku";
    $result = mysqli_query($koneksi, $query_total_buku);
    $data = mysqli_fetch_assoc($result);
    $total_buku = $data['total_buku']; 

    $query_total_siswa = "SELECT COUNT(*) AS total_siswa FROM siswa";
    $hasil = mysqli_query($koneksi, $query_total_siswa);
    $datasiswa = mysqli_fetch_assoc($hasil);
    $total_siswa = $datasiswa['total_siswa'];

    $query_total_peminjaman ="SELECT COUNT(*) AS total_peminjaman FROM peminjaman";
    $hasil_peminjaman = mysqli_query($koneksi, $query_total_peminjaman);
    $datapeminjaman = mysqli_fetch_assoc($hasil_peminjaman);
    $total_peminjaman = $datapeminjaman['total_peminjaman']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Sheila</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  
    <style>
        body {
            background-image: url("aset/background.png");
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1; /* Konten utama akan mengambil semua sisa ruang */
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.1); /* Warna putih transparan */
            backdrop-filter: blur(10px); /* Efek blur kaca buram */
        }
        .navbar a, .navbar-brand {
            color: #fff !important; /* Teks navbar putih */
        }
        .navbar .dropdown-menu {
            background-color: rgba(255, 255, 255, 0.9); /* Warna putih transparan pada dropdown */
        }
        .navbar .dropdown-menu a {
            color: #000 !important; /* Teks dropdown hitam */
        }
        footer {
            background-color: transparent;
            color: #fff; /* Teks footer putih */
            padding: 10px 0;
        }
        .jumbotron {
            color: #fff; /* Teks dalam jumbotron berwarna putih */
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand">Perpustakaan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Data 
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="buku/data_buku.php">Buku</a></li>
                            <li><a class="dropdown-item" href="siswa/data_siswa.php">Siswa</a></li>
                            <li><a class="dropdown-item" href="peminjaman/data_peminjaman.php">Peminjaman</a></li>
                            <li><a class="dropdown-item" href="rak_buku/rak_buku.php">Rak Buku</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-4 mb-5">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4">Welcome</h1>
                            <p class="lead">Platform perpustakaan berbasis web</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cards Section -->
            <div class="row mt-2 mb-5">
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Peminjaman</h5>
                            <p class="card-text">Jumlah buku yang dipinjam <?php echo $total_peminjaman;?></p>
                            <a href="pengembalian/data_pengembalian.php" class="btn btn-primary">Detail Pengembalian</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Data Buku</h5>
                            <p class="card-text">Jumlah Buku <?php echo $total_buku; ?></p>
                            <a href="buku/data_buku.php" class="btn btn-primary">Data Buku</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Data Siswa</h5>
                            <p class="card-text">Jumlah data Siswa <?php echo $total_siswa;?></p>
                            <a href="siswa/data_siswa.php" class="btn btn-primary">Data Siswa</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Akhir Cards Section -->
        </div>
    </div>
    <!-- Akhir Content -->

    <!-- Footer -->
    <footer class="footer text-center">
        <p>Perpustakaan Sheila &COPY;2024</p>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
