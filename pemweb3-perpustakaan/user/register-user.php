<?php
    session_start();
    include "header-user.php";
    include "../koneksi.php";

    if (isset($_POST['simpan'])) {
        $nisn = $_POST['nisn'];
        $nama_siswa = $_POST['nama_siswa'];
        $gender = $_POST['gender'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Option 1: Simpan password langsung 
        $password_plain = $password;

        // Option 2: Simpan password dengan hashing 
        //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert into siswa table
        $query1 = "INSERT INTO siswa (nisn, nama_siswa, gender, tempat_lahir, tgl_lahir, alamat, no_hp) 
                   VALUES ('$nisn', '$nama_siswa', '$gender', '$tempat_lahir', '$tgl_lahir', '$alamat', '$no_hp')";
        
        // Insert into user table
        $query2 = "INSERT INTO user (nama_siswa, username, password) 
                   VALUES ('$nama_siswa', '$username', '$password_plain')";

        // Execute query for siswa table
        if (mysqli_query($koneksi, $query1)) {
            // Execute query for user table if the first one succeeds
            if (mysqli_query($koneksi, $query2)) {
                echo "<script>alert('Data berhasil ditambahkan!');</script>";
                echo "<script>location='pinjam_buku.php';</script>";
            } else {
                // Handle error for user table query
                echo "<script>alert('Gagal menambah data user: " . mysqli_error($koneksi) . "');</script>";
            }
        } else {
            // Handle error for siswa table query
            echo "<script>alert('Gagal menambah data siswa: " . mysqli_error($koneksi) . "');</script>";
        }
    }
?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card">
                <div class="card-header">
                    Tambah Data Siswa
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">NISN</label>
                                    <input type="text" class="form-control" placeholder="NISN" name="nisn" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" placeholder="Nama" name="nama_siswa" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Gender</label>
                                    <select class="form-control" name="gender">
                                        <option value="L">Laki-laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Tempat Lahir</label>
                                    <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label for="">No HP</label>
                                    <input type="text" class="form-control" placeholder="No HP" name="no_hp" required>
                                </div>
                                <div class="form-group">
                                    <label for="">username</label>
                                    <input type="text" class="form-control" placeholder="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="">password</label>
                                    <input type="text" class="form-control" placeholder="password" name="password" required>
                                </div>
                                <input type="submit" class="btn btn-primary mt-3" value="daftar" name="simpan">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "../footer.html";
?>
