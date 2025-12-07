<?php
    include '../koneksi.php';

    $nomor  = $_POST['nomor'];
    $nama   = $_POST['nama'];
    $tipe   = $_POST['tipe'];
    $harga  = $_POST['harga'];

    mysqli_query($koneksi, "INSERT INTO kendaraan VALUES('$nomor','$nama','$tipe','$harga')");

    header("location:kendaraan.php");
?>
