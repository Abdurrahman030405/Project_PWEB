<?php
session_start();
include 'koneksi.php';


if (isset($_SESSION['login'])) {
    header("location:index.php");
    exit;
}


if (isset($_POST['register'])) {

    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Cek apakah nama sudah terdaftar
    $cek = mysqli_query($koneksi, "SELECT * FROM users WHERE nama='$nama'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Nama sudah terdaftar!";
    } else {
        mysqli_query($koneksi, "INSERT INTO users (nama, password) VALUES ('$nama', '$password')");
        $success = "Registrasi berhasil, silakan login!";
    }
}


if (isset($_POST['login'])) {

    $nama     = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $password = $_POST['password'];

    $data = mysqli_query($koneksi, "SELECT * FROM users WHERE nama='$nama'");
    $user = mysqli_fetch_assoc($data);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['login'] = true;
        $_SESSION['nama']  = $user['nama'];
        header("location:index.php");
        exit;
    } else {
        $error = "Nama atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login & Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container" style="max-width:420px;">
    <h2 style="text-align:center;">Login / Register</h2>

    <?php if (isset($error)) { ?>
        <p style="color:red; text-align:center; margin-bottom:10px;">
            <?= $error ?>
        </p>
    <?php } ?>

    <?php if (isset($success)) { ?>
        <p style="color:green; text-align:center; margin-bottom:10px;">
            <?= $success ?>
        </p>
    <?php } ?>

    <form method="post">

        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" name="login" class="btn btn-add" style="width:100%; margin-bottom:10px;">
            Login
        </button>

        <button type="submit" name="register" class="btn btn-back" style="width:100%;">
            Register
        </button>

    </form>
</div>

</body>
</html>

