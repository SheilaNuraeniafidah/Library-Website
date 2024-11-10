<?php
    include "../header.php";
    include "../koneksi.php";

    if (isset($_GET['hapus'])) {
        $nisn = $_GET['hapus'];
        $query="DELETE FROM siswa WHERE nisn='$nisn'";
        $hapus = mysqli_query($koneksi, $query);

        if ($hapus) {
            echo "<script>alert('data berhasil dihapus');</script>";
            echo "<script>location.href='data_siswa.php';</script>";
        }
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card">
                <div class="card-header">
                    DATA SISWA
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="tambah_siswa.php" class="btn btn-primary">Tambah Data</a>
                        </div>
                        <div class="col">
                            <form class="form-inline float-right d-flex" method="get">
                                <input type="text" class="form-control" name="keyword">
                                <input type="submit" class="btn btn-primary ml-2" value="Cari" name="cari">
                            </form>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>NISN</th>
                                    <th>Nama</th>
                                    <th>Gender</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php
                                    if (isset($_GET['cari'])) {
                                        $keyword = $_GET['keyword'];
                                        $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nama_siswa LIKE '%$keyword%'");
                                    } else {
                                        $query = mysqli_query($koneksi, "SELECT * FROM siswa");
                                    }

                                    $no = 1;
                                    while ($ambil_data = mysqli_fetch_array($query)) {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ambil_data['nisn']; ?></td>
                                    <td><a href="detail_siswa.php?nama=<?php echo $ambil_data['nama_siswa']; ?>" style="text-decoration: none; color:black"><?php echo $ambil_data['nama_siswa']; ?></a></td>
                                    <td><?php echo $ambil_data['gender']; ?></td>
                                    <td><?php echo $ambil_data['tempat_lahir']; ?></td>
                                    <td><?php echo $ambil_data['tgl_lahir']; ?></td>
                                    <td><?php echo $ambil_data['alamat']; ?></td>
                                    <td><?php echo $ambil_data['no_hp']; ?></td>
                                    <td>
                                        <a href="edit_siswa.php?nisn=<?php echo $ambil_data['nisn']?>" class="btn btn-warning">Edit</a>
                                        <a href="data_siswa.php?hapus=<?php echo $ambil_data['nisn']?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
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

