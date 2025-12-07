<?php
include '../koneksi.php';

$nomor_lama = $_POST['nomor_lama'];

$nomor  = $_POST['nomor'];
$nama   = $_POST['nama'];
$tipe   = $_POST['tipe'];
$harga  = $_POST['harga'];

mysqli_query($koneksi, "UPDATE kendaraan SET 
    kendaraan_nomor = '$nomor',
    kendaraan_nama = '$nama',
    kendaraan_tipe = '$tipe',
    kendaraan_harga_perhari = '$harga'
    WHERE kendaraan_nomor = '$nomor_lama'
");

header("location:kendaraan.php");
?>