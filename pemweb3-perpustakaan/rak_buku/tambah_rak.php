<?php
    include "../header.php";
    include "../koneksi.php";

    if (isset($_POST['submit'])) {
        $kategori = $_POST['kategori'];  
        $no_rak = $_POST['no_rak'];     
        
        // Debugging
        echo "<pre>";
        var_dump($_POST);
        echo "</pre>";
        
        $query = "INSERT INTO rak_buku (kategori, no_rak) 
                  VALUES ('$kategori', '$no_rak')";
    
        // Eksekusi query dan cek apakah berhasil
        if (mysqli_query($koneksi, $query)) {
            echo "<script>alert('Data berhasil ditambahkan!');</script>";
            echo "<script>location='rak_buku.php';</script>";
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
                    Tambah Rak Buku Baru
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="" method="POST">
                            <div class="form-group">
                                    <label for="">kategori</label>
                                    <input type="text" class="form-control" placeholder="kategori" name="kategori">
                                </div>
                                <div class="form-group">
                                    <label for="">nomor rak</label>
                                    <input type="text" class="form-control" placeholder="nomor rak" name="no_rak">
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
