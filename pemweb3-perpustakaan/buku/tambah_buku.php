<?php
    include "../header.php";
    include "../koneksi.php";

    if (isset($_POST['submit'])) {
        $isbn = $_POST['isbn'];
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $kategori = $_POST['kategori'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $jumlah = $_POST['jumlah'];

        // Debugging
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        
        $query = "INSERT INTO buku (isbn, judul, penulis, penerbit, kategori, tahun_terbit, jumlah) 
                  VALUES ('$isbn', '$judul', '$penulis', '$penerbit', '$kategori', '$tahun_terbit', '$jumlah')";

        // Eksekusi query dan cek apakah berhasil
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!');</script>";
            echo "<script>location='data_buku.php';</script>";
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
                    Tambah Data Buku
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                            <div class="form-group">
                                    <label for="">isbn</label>
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
                                    <label for="">penerbit</label>
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
