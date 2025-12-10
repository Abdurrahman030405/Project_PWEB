<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:auth.php");
    exit;
}

include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM crypto_assets WHERE id='$id'");
$d = mysqli_fetch_array($data);

if (!$d) {
    echo "Data tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Crypto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container" style="max-width:600px;">
    <h2 style="text-align:center;">Detail Data Crypto</h2>

    <table>
        <tr>
            <th>Simbol</th>
            <td><?= $d['simbol'] ?></td>
        </tr>
        <tr>
            <th>Nama Crypto</th>
            <td><?= $d['nama_crypto'] ?></td>
        </tr>
        <tr>
            <th>Harga</th>
            <td>$ <?= number_format($d['harga'], 2) ?></td>
        </tr>
        <tr>
            <th>Total Alokasi</th>
            <td><?= $d['total_alokasi'] ?>%</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td><?= $d['kategori'] ?></td>
        </tr>
        <tr>
            <th>Dibuat</th>
            <td><?= $d['created_at'] ?></td>
        </tr>
    </table>

    <br>

    <div style="text-align:center;">
         <a href="index.php" class="btn btn-back">Kembali</a>
        
    </div>
</div>

</body>
</html>
