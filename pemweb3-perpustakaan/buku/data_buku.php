<?php
    include "../header.php";
    include "../koneksi.php"; 

    if (isset($_GET['hapus'])) {
        $id_buku = $_GET['hapus'];
        $query = "DELETE FROM buku WHERE id_buku='$id_buku'";
        $hapus = mysqli_query($koneksi, $query);

        if($hapus){
            echo "<script>alert('Data berhasil dihapus!');</script>";
            echo "<script>location='data_buku.php';</script>";
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card"> 
                <div class="card-header">
                    Data Buku
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="tambah_buku.php" class="btn btn-primary">Tambah Data</a>
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
                                    <th>isbn</th>
                                    <th>judul</th>
                                    <th>penulis</th>
                                    <th>penerbit</th>
                                    <th>kategori</th>
                                    <th>tahun terbit</th>
                                    <th>jumlah</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                    if(isset($_GET['cari'])){ 
                                        $keyword=$_GET['keyword'];                
                                        $query=mysqli_query($koneksi, "SELECT * FROM buku where judul like '%$keyword%'");
                                    }else{
                                        $query=mysqli_query($koneksi, "SELECT * FROM buku");
                                    }

                                    $no=1;
                                    while ($ambil_data=mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ambil_data['isbn']; ?></td>
                                    <td><?php echo $ambil_data['judul']; ?> </td>
                                    <td><?php echo $ambil_data['penulis']; ?> </td>
                                    <td><?php echo $ambil_data['penerbit']; ?></td>
                                    <td><?php echo $ambil_data['kategori']; ?></td>
                                    <td><?php echo $ambil_data['tahun_terbit']; ?></td>
                                    <td><?php echo $ambil_data['jumlah']; ?></td>
                                    <td>
                                        <!-- Tombol Edit -->
                                         <a href="edit_buku.php" class="btn btn-warning">Edit</a>
                                       <!-- Tombol Hapus -->
                                       <a href="data_buku.php?hapus=<?php echo $ambil_data['id_buku']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
