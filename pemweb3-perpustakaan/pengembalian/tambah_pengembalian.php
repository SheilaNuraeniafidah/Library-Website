<?php
    include "../header.php";
    include "../koneksi.php";

    if (isset($_POST['submit'])) {
        $nisn = $_POST['nisn'];
        $judul = $_POST['judul'];
        $tgl_pinjam = $_POST['tgl_pinjam'];
        $tgl_harus_kembali = $_POST['tgl_harus_kembali'];
        $tgl_kembali = $_POST['tgl_kembali'];
        $denda = $_POST['denda'];

        // Debugging
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        
        $query = "INSERT INTO pengembalian (nisn, judul, tgl_pinjam, tgl_harus_kembali, tgl_kembali, denda) 
                  VALUES ('$nisn', '$judul', '$tgl_pinjam', '$tgl_harus_kembali', '$tgl_kembali', '$denda')";

        // Eksekusi query dan cek apakah berhasil
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!');</script>";
            echo "<script>location='data_pengembalian.php';</script>";
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
                    Tambah Data Pengembalian
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                            <div class="form-group">
                                    <label for="">nisn</label>
                                    <input type="text" class="form-control" placeholder="nisn" name="nisn">
                                </div>
                                <div class="form-group">
                                    <label for="">judul</label>
                                    <input type="text" class="form-control" placeholder="judul" name="judul">
                                </div>
                                <div class="form-group">
                                    <label for="tgl_pinjam">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pinjam" id="tgl_pinjam" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_harus_kembali">Tanggal Harus Kembali</label>
                                    <input type="date" class="form-control" name="tgl_harus_kembali" id="tgl_harus_kembali" required>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_harus_kembali">Tanggal Kembali</label>
                                    <input type="date" class="form-control" name="tgl_kembali" id="tgl_kembali" required>
                                </div>
                                <div class="form-group">
                                    <label for="">denda</label>
                                    <input type="text" class="form-control" placeholder="denda" name="denda">
                                </div>
                                <input type="submit" class="btn btn-primary mt-3" values="simpan" name="submit">
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
