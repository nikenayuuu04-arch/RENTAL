<?php
include '../koneksi.php';

$id_lama  = $_POST['id_lama'];

$kendaraan_nomor = $_POST['kendaraan_nomor'];
$user_id         = $_POST['user_id'];
$tgl_pinjam      = $_POST['tgl_pinjam'];
$tgl_kembali     = $_POST['tgl_kembali'];
$pinjam_status   = $_POST['pinjam_status'];

mysqli_query($koneksi, "UPDATE pinjam SET 
    kendaraan_nomor = '$kendaraan_nomor',
    user_id = '$user_id',
    tgl_pinjam = '$tgl_pinjam',
    tgl_kembali = '$tgl_kembali',
    pinjam_status = '$pinjam_status'
    WHERE pinjam_id = '$id_lama'
");

header("location:pinjam.php");
?>