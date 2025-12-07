<?php
    include '../koneksi.php';

    $kendaraan_nomor = $_POST['kendaraan_nomor'];
    $user_id         = $_POST['user_id'];
    $tgl_pinjam      = $_POST['tgl_pinjam'];
    $tgl_kembali     = $_POST['tgl_kembali'];
    $status          = $_POST['pinjam_status'];

    mysqli_query($koneksi, "INSERT INTO pinjam VALUES(
        NULL,
        '$kendaraan_nomor',
        '$user_id',
        '$tgl_pinjam',
        '$tgl_kembali',
        '$status'
    )");

    header("location:pinjam.php");
?>
