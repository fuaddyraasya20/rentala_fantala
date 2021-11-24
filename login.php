<?php
    include 'koneksi.php';

    $pass = $_POST['password'];
    $username = mysqli_escape_string($koneksi, $_POST['username']);
    $password = mysqli_escape_string($koneksi, $pass);

    $cek_user = mysqli_query($koneksi, "SELECT * FROM tb_admin WHERE username = '$username' ");
    $user_valid = mysqli_fetch_array($cek_user);

    if ($user_valid) {
        if ($password == $user_valid['password']) {
            session_start();
            $_SESSION['username'] = $user_valid['username'];
            $_SESSION['nama'] = $user_valid['nama'];
            header('location:home.php');
            echo "<script>alert('Login Berhasil!')</script>";
        }
        else {
            echo "<script>alert('Maaf, Login Gagal, Password anda tidak sesuai!')</script>";
            header('location:index.php');
        }
    }
    else {
        echo "<script>alert('Maaf, Login Gagal, Username anda tidak terdaftar!')</script>";
        header('location:index.php');
    }
?>