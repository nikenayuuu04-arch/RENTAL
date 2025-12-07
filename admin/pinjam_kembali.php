<?php
include '../koneksi.php';

$id = $_GET['id'];

$d = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT * FROM pinjam WHERE pinjam_id='$id'"
));

$kendaraan = $d['kendaraan_nomor'];

mysqli_query($koneksi, "
    UPDATE pinjam SET pinjam_status='1'
    WHERE pinjam_id='$id'
");

mysqli_query($koneksi, "
    UPDATE kendaraan SET kendaraan_status='1'
    WHERE kendaraan_nomor='$kendaraan'
");

echo "<script>alert('Kendaraan telah dikembalikan & status menjadi READY.'); 
window.location.href='pinjam.php'</script>";
?>