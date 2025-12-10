<?php
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM crypto_assets WHERE id='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['update'])) {
    $simbol   = $_POST['simbol'];
    $nama     = $_POST['nama'];
    $harga    = $_POST['harga'];
    $total    = $_POST['total'];
    $kategori = $_POST['kategori'];

    mysqli_query($koneksi, "UPDATE crypto_assets 
        SET simbol='$simbol', 
            nama_crypto='$nama', 
            harga='$harga',
            total_alokasi='$total',
            kategori='$kategori'
        WHERE id='$id'");

    header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Crypto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Edit Data Crypto</h2>

    <form method="post">

        <div class="form-group">
            <label>Simbol</label>
            <input type="text" name="simbol" value="<?= $d['simbol'] ?>" required>
        </div>

        <div class="form-group">
            <label>Nama Crypto</label>
            <input type="text" name="nama" value="<?= $d['nama_crypto'] ?>" required>
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="text" name="harga" value="<?= $d['harga'] ?>" required>
        </div>

        <div class="form-group">
            <label>Total Alokasi</label>
            <input type="text" name="total" value="<?= $d['total_alokasi'] ?>" required>
        </div>

        <div class="form-group">
            <label>Kategori</label>
            <input type="text" name="kategori" value="<?= $d['kategori'] ?>" required>
        </div>

        <button type="submit" name="update" class="btn btn-edit">Update</button>
        <a href="index.php" class="btn btn-back">Kembali</a>

    </form>
</div>

</body>
</html>
