<html>
<head>
    <title>Invoice Peminjaman Kendaraan</title>
    <link rel="stylesheet" type="text/css" href="../aset/css/bootstrap.css">
    <script type="text/javascript" src="../aset/js/jquery.js"></script>
    <script type="text/javascript" src="../aset/js/bootstrap.js"></script>
</head>
<body>
<?php
    session_start();
    if ($_SESSION['status'] != "login") {
        header("location:../index.php?pesan=belum_login");
    }
    include '../koneksi.php';
?>

<div class="col-md-8 col-md-offset-2">
    <?php
        $id = $_GET['id'];

        $q = mysqli_query($koneksi,
            "SELECT * FROM pinjam
             JOIN user ON pinjam.user_id = user.user_id
             JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
             WHERE pinjam_id='$id'"
        );

        while ($d = mysqli_fetch_array($q)) {
    ?>

    <center>
        <h2><b>INVOICE PEMINJAMAN KENDARAAN</b></h2>
        <h4>RENTAL KENDARAAN SKANEGA</h4>
        <hr>
    </center>

    <table class="table">
        <tr>
            <th width="25%">No. Invoice</th>
            <th width="5%">:</th>
            <td>INV-<?php echo $d['pinjam_id']; ?></td>
        </tr>

        <tr>
            <th>Peminjam</th>
            <th>:</th>
            <td><?php echo $d['user_nama']; ?></td>
        </tr>

        <tr>
            <th>Nama Kendaraan</th>
            <th>:</th>
            <td><?php echo $d['kendaraan_nama']; ?></td>
        </tr>

        <tr>
            <th>Tgl Pinjam</th>
            <th>:</th>
            <td><?php echo $d['tgl_pinjam']; ?></td>
        </tr>

        <tr>
            <th>Tgl Kembali</th>
            <th>:</th>
            <td><?php echo $d['tgl_kembali']; ?></td>
        </tr>

        <tr>
            <th>Harga / Hari</th>
            <th>:</th>
            <td><?php echo "Rp. " . number_format($d['kendaraan_harga_perhari']); ?></td>
        </tr>

        <tr>
            <th>Status</th>
            <th>:</th>
            <td>
                <?php
                    if ($d['pinjam_status'] == 1) {
                        echo "<span class='label label-success'>READY</span>";
                    } elseif ($d['pinjam_status'] == 2) {
                        echo "<span class='label label-warning'>DIPINJAM</span>";
                    } else {
                        echo "<span class='label label-primary'>SELESAI</span>";
                    }
                ?>
            </td>
        </tr>
    </table>

    <br>

    <p class="text-center"><i>"Terima Kasih Telah Menggunakan Layanan Rental Kami"</i></p>

    <?php } ?>
</div>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>