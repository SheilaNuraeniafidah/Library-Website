<?php
include "../header.php";
include "../koneksi.php";

// Ambil data peminjaman berdasarkan id dari URL
if (isset($_GET['id'])) {
    $id_peminjaman = $_GET['id'];
    $query_peminjaman = "SELECT * FROM peminjaman WHERE id_peminjaman = '$id_peminjaman'";
    $result = mysqli_query($koneksi, $query_peminjaman);
    
    // Cek apakah data ditemukan
    if (mysqli_num_rows($result) > 0) {
        $data_peminjaman = mysqli_fetch_assoc($result); // Mengambil data peminjaman
    } else {
        echo "<script>alert('Data peminjaman tidak ditemukan.');</script>";
        echo "<script>location='data_peminjaman.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID peminjaman tidak diberikan.');</script>";
    echo "<script>location='data_peminjaman.php';</script>";
    exit;
}

// Proses edit status peminjaman
if (isset($_POST['edit'])) {
    $id_peminjaman = $_POST['id_peminjaman'];
    $status_pinjam = $_POST['status_pinjam'];

    $query_update = "UPDATE peminjaman SET status_pinjam='$status_pinjam' WHERE id_peminjaman='$id_peminjaman'";
    
    if (mysqli_query($koneksi, $query_update)) {
        echo "<script>alert('Data berhasil diedit!');</script>";
        echo "<script>location='data_peminjaman.php';</script>";
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
                    Edit Data Status Peminjaman
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                                <!-- Hidden input untuk mengirim id_peminjaman -->
                                <input type="hidden" name="id_peminjaman" value="<?php echo $data_peminjaman['id_peminjaman']; ?>">

                                <div class="form-group">
                                    <label for="status">Status Peminjaman</label>
                                    <select class="form-control" name="status_pinjam" id="status" required>
                                        <option value="">-- Pilih Status --</option>
                                        <option value="pinjam" <?php if($data_peminjaman['status_pinjam'] == 'pinjam') echo 'selected'; ?>>Pinjam</option>
                                        <option value="kembali" <?php if($data_peminjaman['status_pinjam'] == 'kembali') echo 'selected'; ?>>Kembali</option>
                                    </select>
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
