<?php
    session_start();
    include "../header.php";
    include "../koneksi.php"; 

    if (isset($_GET['hapus'])) {
        $id_peminjaman = $_GET['hapus'];
        $query = "DELETE FROM peminjaman WHERE id_peminjaman='$id_peminjaman'";
        $hapus = mysqli_query($koneksi, $query);

        if($hapus){
            echo "<script>alert('Data berhasil dihapus!');</script>";
            echo "<script>location='data_peminjaman.php';</script>";
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card"> 
                <div class="card-header">
                    Data Peminjaman
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="tambah_peminjaman.php" class="btn btn-primary">Tambah Data</a>
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
                                    <th>nisn</th>
                                    <th>judul</th>
                                    <th>tgl_pinjam</th>
                                    <th>tgl_harus_kembali</th>
                                    <th>status</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                    if(isset($_GET['cari'])){ 
                                        $keyword=$_GET['keyword'];                
                                        $query=mysqli_query($koneksi, "SELECT * FROM peminjaman where nisn like '%$keyword%'");
                                    }else{
                                        $query=mysqli_query($koneksi, "SELECT * FROM peminjaman");
                                    }

                                    $no=1;
                                    while ($ambil_data=mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ambil_data['nisn']; ?></td>
                                    <td><?php echo $ambil_data['judul']; ?> </td>
                                    <td><?php echo $ambil_data['tgl_pinjam']; ?> </td>
                                    <td><?php echo $ambil_data['tgl_harus_kembali']; ?></td>
                                    <td><?php echo $ambil_data['status_pinjam']; ?></td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="edit_peminjaman.php?id=<?php echo $ambil_data['id_peminjaman']; ?>" class="btn btn-warning">Edit</a>
                                         <!-- Tombol Edit -->
                                       <!-- Tombol Hapus -->
                                       <a href="data_peminjaman.php?hapus=<?php echo $ambil_data['id_peminjaman']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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
