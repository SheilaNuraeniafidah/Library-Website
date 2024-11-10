<?php
session_start();
    if (!isset($_SESSION['id_siswa'])) {
        echo "<script>alert('Silakan login terlebih dahulu!');</script>";
        echo "<script>location='user/login-user.php';</script>";
        exit;
    }

    include "koneksi.php";

    $query_buku = "SELECT * FROM buku";
    $result = mysqli_query($koneksi, $query_buku);

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
            background-image: url("aset/background2.png");
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1; 
        }
        .navbar {
            background-color: rgba(255, 255, 255, 0.1); 
            backdrop-filter: blur(10px); 
        }
        .navbar a, .navbar-brand {
            color: #fff !important; 
        }
        .navbar .dropdown-menu {
            background-color: rgba(255, 255, 255, 0.9); 
        }
        .navbar .dropdown-menu a {
            color: #000 !important; 
        }
        footer {
            background-color: transparent;
            color: #fff; 
            padding: 10px 0;
        }
        .jumbotron {
            color: #fff; 
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
                        <a class="nav-link active" aria-current="page" href="index-user.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Siswa
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="user/register-user.php">daftar</a></li>
                            <li><a class="dropdown-item" href="user/login-user.php">login</a></li>
                            <li><a class="dropdown-item" href="user/logout-user.php">logout</a></li>
                        </ul>
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
                            <h1 class="display-4">Welcome </h1>
                            <p class="lead">Platform perpustakaan berbasis web</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Cards Section -->
            <div class="row mt-2 mb-5">
                <?php while ($data_buku = mysqli_fetch_assoc($result)) { ?>
                <div class="col-md-3">
                    <div class="card mb-4" style="width: 18rem;">
                        <!-- Gambar buku -->
                        <img src="aset/buku1.png" class="card-img-top" alt="Gambar Buku">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $data_buku['judul']; ?></h5>
                            <p class="card-text"><?php echo $data_buku['penulis']; ?></p>
                            <a href="user/pinjam_buku.php" class="btn btn-primary">Pinjam</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
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
