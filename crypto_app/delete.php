<?php
include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM crypto_assets WHERE id='$id'");

header("location:index.php");
?>
