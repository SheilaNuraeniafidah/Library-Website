<?php
    include "../header.php";
    include "../koneksi.php"; 

    if (isset($_GET['hapus'])) {
        $id_rak = $_GET['hapus'];  
        $query = "DELETE FROM rak_buku WHERE id_rak='$id_rak'";
        $hapus = mysqli_query($koneksi, $query);
    
        if ($hapus) {
            echo "<script>alert('Data berhasil dihapus!');</script>";
            echo "<script>location='rak_buku.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus data: " . mysqli_error($koneksi) . "');</script>";
        }
    }
    
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card"> 
                <div class="card-header">
                    Informasi Rak Buku
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="tambah_rak.php" class="btn btn-primary">Tambah Rak Baru</a>
                        </div>
                        <div class="col">
                            <form class="form-inline float-right d-flex" method="get">
                                <input type="text" class="form-control" name="keyword">
                                <input type="submit" class="btn btn-primary ml-2" value="Kirim" name="cari" value="Cari">
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Nomor Rak</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                    if(isset($_GET['cari'])){ 
                                        $keyword=$_GET['keyword'];                
                                        $query=mysqli_query($koneksi, "SELECT * FROM rak_buku where kategori like '%$keyword%'");
                                    }else{
                                        $query=mysqli_query($koneksi, "SELECT * FROM rak_buku");
                                    }

                                    $no=1;
                                    while ($ambil_data=mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ambil_data['kategori']; ?></td>
                                    <td><?php echo $ambil_data['no_rak']; ?> </td>
                                    <td>
                                       <!-- Tombol Hapus -->
                                       <a href="rak_buku.php?hapus=<?php echo $ambil_data['id_rak']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                            </table>
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
