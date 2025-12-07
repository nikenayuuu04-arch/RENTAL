<?php
    include '../koneksi.php';

    $nomor = $_GET['nomor'];

    mysqli_query($koneksi, "DELETE FROM kendaraan WHERE kendaraan_nomor='$nomor'");

    echo "<script>alert('Data kendaraan akan dihapus!'); window.location.href='kendaraan.php'</script>";
?>
