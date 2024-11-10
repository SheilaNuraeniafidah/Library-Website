<?php
    include "../header.php";
    include "../koneksi.php"; 

    if (isset($_GET['nama'])) {
        $nama = $_GET['nama'];
        $query = "SELECT * FROM siswa WHERE nama_siswa = '$nama'"; 
        $result = mysqli_query($koneksi, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $siswa = mysqli_fetch_assoc($result);
        } else {
            echo "Data siswa tidak ditemukan!";
            exit();
        }
    } else {
        echo "Nama siswa tidak diberikan!";
        exit();
    }
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12 mt-2" style="min-height: 585px;">
            <div class="card">
                <div class="card-header">
                    Detail SISWA
                </div>
                <div class="card-body">
                    <h2>Detail Siswa</h2>
                    <p><strong>NISN:</strong> <?php echo $siswa['nisn']; ?></p>
                    <p><strong>Nama:</strong> <?php echo $siswa['nama_siswa']; ?></p>
                    <p><strong>Gender:</strong> <?php echo $siswa['gender']; ?></p>
                    <p><strong>Tempat Lahir:</strong> <?php echo $siswa['tempat_lahir']; ?></p>
                    <p><strong>Tanggal Lahir:</strong> <?php echo $siswa['tgl_lahir']; ?></p>
                    <p><strong>Alamat:</strong> <?php echo $siswa['alamat']; ?></p>
                    <p><strong>No HP:</strong> <?php echo $siswa['no_hp']; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include "../footer.html";
?>
