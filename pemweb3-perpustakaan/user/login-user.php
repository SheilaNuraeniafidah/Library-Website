<?php
    session_start();
    include "../koneksi.php";
    
    if(isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    
        $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($koneksi, $query);
    
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            
            // Set session setelah berhasil login
            $_SESSION['id_siswa'] = $row['id_siswa']; 
            $_SESSION['nama_siswa'] = $row['nama']; 
            
            // Alihkan ke dashboard
            echo "<script>alert('Login berhasil!');</script>";
            echo "<script>location='../index-user.php';</script>";
        } else {
            echo "<script>alert('Username atau password salah!');</script>";
            echo "<script>location='login-user.php';</script>";
        }
    }
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
            background-image: url("../aset/background3.png");
            background-size: cover;
            background-position: center;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .login-box {
            background-color: rgba(255, 255, 255, 0.2); /* Transparansi box */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px; /* Ukuran box dibatasi */
            color: #fff;
        }
        .form-group label {
            color: #fff;
        }
        .btn-primary {
            width: 100%;
        }
        footer {
            background-color: transparent;
            color: #fff; 
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 class="text-center">Login Siswa</h2>
        <form action="" method="POST">
            <div class="form-group mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </form>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>Perpustakaan Sheila &COPY;2024</p>
    </footer>
    <!-- Akhir Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
