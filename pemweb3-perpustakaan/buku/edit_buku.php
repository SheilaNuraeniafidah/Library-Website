<?php
    include "../header.php";
    include "../koneksi.php";
    if (isset($_POST['edit'])) {
            $isbn = $_POST['isbn'];
            $judul = $_POST['judul'];
            $penulis = $_POST['penulis'];
            $penerbit= $_POST['penerbit'];
            $kategori = $_POST['kategori'];
            $tahun_terbit = $_POST['tahun_terbit'];
            $jumlah = $_POST['jumlah'];

            $query_update = "UPDATE buku SET isbn='$isbn', judul='$judul', penulis='$penulis', 
                            penerbit='$penerbit', kategori='$kategori', tahun_terbit='$tahun_terbit', jumlah '$jumlah' WHERE isbn='$isbn'";
            
            if (mysqli_query($koneksi, $query_update)) {
                echo "<script>alert('Data berhasil diedit!');</script>";
                echo "<script>location='data_buku.php';</script>";
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
                    Edit Data Buku
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="">ISBN</label>
                                    <input type="text" class="form-control" placeholder="isbn" name="isbn">
                                </div>
                                <div class="form-group">
                                    <label for="">judul</label>
                                    <input type="text" class="form-control" placeholder="judul" name="judul">
                                </div>
                                <div class="form-group">
                                    <label for="">penulis</label>
                                    <input type="text" class="form-control" placeholder="penulis" name="penulis">
                                </div>
                                <div class="form-group">
                                    <label for="">Penerbit</label>
                                    <input type="text" class="form-control" placeholder="penerbit" name="penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="">kategori</label>
                                    <input type="text" class="form-control" placeholder="kategori" name="kategori">
                                </div>
                                <div class="form-group">
                                    <label for="">tahun terbit</label>
                                    <input type="text" class="form-control" placeholder="tahun terbit" name="tahun_terbit">
                                </div>
                                <div class="form-group">
                                    <label for="">jumlah</label>
                                    <input type="text" class="form-control" placeholder="jumlah" name="jumlah">
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