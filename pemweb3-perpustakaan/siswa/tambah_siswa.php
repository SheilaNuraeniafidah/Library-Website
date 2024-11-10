<?php
    include "../header.php";
    include "../koneksi.php";

    if (isset($_POST['simpan'])) {
        $nisn = $_POST['nisn'];
        $nama_siswa = $_POST['nama_siswa'];
        $gender = $_POST['gender'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];

        // Debugging
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";

        $query = "INSERT INTO siswa (nisn, nama_siswa, gender, tempat_lahir, tgl_lahir, alamat, no_hp) 
              VALUES ('$nisn', '$nama_siswa', '$gender', '$tempat_lahir', '$tgl_lahir', '$alamat', '$no_hp')";
      
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!');</script>";
            echo "<script>location='data_siswa.php';</script>";
        } else {
            // Tambahkan pesan error dari database
            echo "<script>alert('Gagal menambah data: " . mysqli_error($koneksi) . "');</script>";
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
                                <input type="submit" class="btn btn-primary mt-3" value="Simpan" name="simpan">
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
