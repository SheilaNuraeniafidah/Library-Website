<?php
    include "../header.php";
    include "../koneksi.php";
    if (isset($_POST['edit'])) {
            $nama_siswa = $_POST['nama_siswa'];
            $gender = $_POST['gender'];
            $tempat_lahir = $_POST['tempat_lahir'];
            $tgl_lahir = $_POST['tgl_lahir'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];

            $query_update = "UPDATE siswa SET nama_siswa='$nama_siswa', gender='$gender', tempat_lahir='$tempat_lahir', 
                            tgl_lahir='$tgl_lahir', alamat='$alamat', no_hp='$no_hp' WHERE nisn='$nisn'";
            
            if (mysqli_query($koneksi, $query_update)) {
                echo "<script>alert('Data berhasil diedit!');</script>";
                echo "<script>location='data_siswa.php';</script>";
            } else {
                echo "<script>alert('Gagal mengedit data. Coba lagi.');</script>";
            }
        }
?>


<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card">
                <div class="card-header">
                    Edit Data Siswa
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">NISN</label>
                                    <input type="text" class="form-control" placeholder="nisn" name="nisn">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" class="form-control" placeholder="nama" name="nama">
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
                                    <input type="text" class="form-control" placeholder="tempat lahir" name="tempat_lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tgl_lahir">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <input type="text" class="form-control" placeholder="alamat" name="alamat">
                                </div>
                                <div class="form-group">
                                    <label for="">No HP</label>
                                    <input type="text" class="form-control" placeholder="nomor hp" name="no_hp">
                                </div>
                                <input type="submit" class="btn btn-primary mt-3" name="edit" value="Simpan Perubahan">
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