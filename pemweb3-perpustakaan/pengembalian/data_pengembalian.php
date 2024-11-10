<?php
include "../header.php";
include "../koneksi.php";

// if (isset($_POST['edit'])) {
//     $id_peminjaman = $_GET['id_peminjaman'];
//     $status_pinjam = $_GET['status_pinjam'];

//     // Ambil data dari tabel peminjaman
//     $query_peminjaman = "SELECT * FROM peminjaman WHERE id_peminjaman='$id_peminjaman'";
//     $result = mysqli_query($koneksi, $query_peminjaman);
//     $data_peminjaman = mysqli_fetch_assoc($result);

//     // Jika status diubah menjadi 'kembali'
//     if ($status_pinjam == 'kembali') {
//         $nisn = $data_peminjaman['nisn'];
//         $judul = $data_peminjaman['judul'];
//         $tgl_pinjam = $data_peminjaman['tgl_pinjam'];
//         $tgl_harus_kembali = $data_peminjaman['tgl_harus_kembali'];

//         // Hitung denda jika terlambat
//         $tgl_sekarang = date('Y-m-d');
//         $datetime1 = new DateTime($tgl_harus_kembali);
//         $datetime2 = new DateTime($tgl_sekarang);
//         $interval = $datetime1->diff($datetime2);
//         $telat_hari = $interval->format('%r%a'); // Jumlah hari terlambat

//         $denda = 0;
//         if ($telat_hari > 0) {
//             $denda = $telat_hari * 5000; // Denda Rp5000 per hari terlambat
//         }

//         // Masukkan data ke tabel pengembalian
//         $query_pengembalian = "INSERT INTO pengembalian (nisn, judul, tgl_pinjam, tgl_harus_kembali, tgl_kembali, denda) 
//                        VALUES ('$nisn', '$judul', '$tgl_pinjam', '$tgl_harus_kembali', '$tgl_sekarang', '$denda')";

//         if (mysqli_query($koneksi, $query_pengembalian)) {
//             // Hapus data dari tabel peminjaman setelah dikembalikan
//             $query_hapus_peminjaman = "DELETE FROM peminjaman WHERE id_peminjaman='$id_peminjaman'";
//             mysqli_query($koneksi, $query_hapus_peminjaman);

//             echo "<script>alert('Buku telah dikembalikan dan denda telah dihitung.');</script>";
//             echo "<script>location='data_pengembalian.php';</script>";
//         } else {
//             echo "Error: " . mysqli_error($koneksi);
//         }
//     }
// }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card"> 
                <div class="card-header">
                    Detail pengembalian
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <a href="tambah_pengembalian.php" class="btn btn-primary">Tambah Data</a>
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
                                    <th>id kembali</th>
                                    <th>nisn</th>
                                    <th>judul</th>
                                    <th>tgl_pinjam</th>
                                    <th>tgl_harus_kembali</th>
                                    <th>tgl_kembali</th>
                                    <th>denda</th>
                                    <th>aksi</th>
                                </tr>
                                <?php
                                    if(isset($_GET['cari'])){ 
                                        $keyword=$_GET['keyword'];                
                                        $query=mysqli_query($koneksi, "SELECT * FROM pengembalian where nisn like '%$keyword%'");
                                    }else{
                                        $query=mysqli_query($koneksi, "SELECT * FROM pengembalian");
                                    }

                                    $no=1;
                                    while ($ambil_data=mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $ambil_data['id_kembali']; ?></td>
                                    <td><?php echo $ambil_data['nisn']; ?></td>
                                    <td><?php echo $ambil_data['judul']; ?> </td>
                                    <td><?php echo $ambil_data['tgl_pinjam']; ?> </td>
                                    <td><?php echo $ambil_data['tgl_harus_kembali']; ?></td>
                                    <td><?php echo $ambil_data['tgl_kembali']; ?></td>
                                    <td><?php echo $ambil_data['denda']; ?></td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <a href="edit_pengembalian.php?id=<?php echo $ambil_data['id_kembali']; ?>" class="btn btn-warning">Edit</a>
                                         <!-- Tombol Edit -->
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