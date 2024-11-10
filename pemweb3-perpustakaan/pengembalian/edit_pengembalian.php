<?php
    include "../header.php";
    include "../koneksi.php";
    if (isset($_POST['edit'])) {
            $nisn = $_POST['nisn'];
            $judul = $_POST['judul'];
            $tgl_pinjam = $_POST['tgl_pinjam'];
            $tgl_harus_kembali = $_POST['tgl_harus_kembali'];
            $tgl_kembali = $_POST['tgl_kembali'];
            $denda = $_POST['denda'];

            $query_update = "UPDATE pengembalian SET nisn='$nisn', judul='$judul', tgl_pinjam='$tgl_pinjam', 
                            tgl_harus_kembali='$tgl_harus_kembali', tgl_kembali='$tgl_kembali', denda='$denda' WHERE nisn='$nisn'";
            
            if (mysqli_query($koneksi, $query_update)) {
                echo "<script>alert('Data berhasil diedit!');</script>";
                echo "<script>location='data_pengembalian.php';</script>";
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
                    Edit Data Pengembalian
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
                                    <label for="">judul</label>
                                    <input type="text" class="form-control" placeholder="judul" name="judul">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal pinjam</label>
                                    <input type="date" class="form-control" name="tgl_pinjam">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal harus kembali</label>
                                    <input type="date" class="form-control" name="tgl_hrs_kembali">
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal kembali</label>
                                    <input type="date" class="form-control" name="tgl_kembali">
                                </div>
                                <div class="form-group">
                                    <label for="">denda</label>
                                    <input type="text" class="form-control" placeholder="denda" name="denda">
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