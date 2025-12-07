<?php
    include '../koneksi.php';

    $id = $_GET['id'];

    mysqli_query($koneksi, "DELETE FROM user WHERE user_id='$id'");

    echo "<script>alert('Data user akan dihapus!'); window.location.href='user.php'</script>";
?>
