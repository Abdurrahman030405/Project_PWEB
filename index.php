<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:auth.php");
    exit;
}

include 'koneksi.php';
$data = mysqli_query($koneksi, "SELECT * FROM crypto_assets");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Crypto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Manajemen Crypto</h2>
        <a href="create.php" class="btn btn-add">+ Tambah Crypto</a>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>Simbol</th>
            <th>Nama</th>
            <th>Harga Masuk</th>
            <th>Total Alokasi</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php while ($d = mysqli_fetch_array($data)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['simbol'] ?></td>
            <td><?= $d['nama_crypto'] ?></td>
            <td>$ <?= number_format($d['harga']) ?></td>
            <td><?= $d['total_alokasi'] ?>%</td>
            <td><?= $d['kategori'] ?></td>
            <td>
                 <a href="read.php?id=<?= $d['id'] ?>" class="btn btn-back">Detail</a>
                <a href="update.php?id=<?= $d['id'] ?>" class="btn btn-edit">Edit</a>
                <a href="delete.php?id=<?= $d['id'] ?>" class="btn btn-delete" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>

    </table>
</div>

</body>
</html>
