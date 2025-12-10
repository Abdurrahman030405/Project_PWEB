<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $simbol   = $_POST['simbol'];
    $nama     = $_POST['nama'];
    $harga    = $_POST['harga'];
    $alokasi  = $_POST['total'];
    $kategori = $_POST['kategori'];

    // SIMPAN KE DATABASE
    $query = "INSERT INTO crypto_assets 
              (simbol, nama_crypto, harga, total_alokasi, kategori) 
              VALUES 
              ('$simbol', '$nama', '$harga', '$alokasi', '$kategori')";

    mysqli_query($koneksi, $query);

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Crypto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Tambah Data Crypto</h2>

    <form method="post">

        <div class="form-group">
            <label>Simbol</label>
            <input type="text" name="simbol" required>
        </div>

        <div class="form-group">
            <label>Nama Crypto</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Harga Masuk</label>
            <input type="text" name="harga" required>
        </div>

        <div class="form-group">
            <label>Total Alokasi</label>
            <input type="text" name="total" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" required>
        </div>

        <button type="submit" name="simpan" class="btn btn-add">Simpan</button>
        <a href="index.php" class="btn btn-back">Kembali</a>

    </form>
</div>

</body>
</html>
