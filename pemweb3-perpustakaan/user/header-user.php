<?php
    include "../koneksi.php";

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
            background-image: url("../aset/background2.png");
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
            z-index: 1000; /* Agar navbar berada di atas */
            position: sticky;
            top: 0;
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand">Perpustakaan </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index-user.php">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Siswa
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../user/register-user.php">daftar</a></li>
                            <li><a class="dropdown-item" href="../user/login-user.php">login</a></li>
                            <li><a class="dropdown-item" href="../user/logout-user.php">logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->