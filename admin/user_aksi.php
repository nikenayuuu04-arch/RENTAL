<?php
    include '../koneksi.php';

    $username   = $_POST['username'];
    $password   = md5($_POST['password']);
    $nama       = $_POST['nama'];
    $alamat     = $_POST['alamat'];
    $status     = $_POST['status'];

    mysqli_query($koneksi, "INSERT INTO user VALUES(NULL, '$username', '$password', '$nama', '$alamat', '$status')");

    header("location:user.php");
?>