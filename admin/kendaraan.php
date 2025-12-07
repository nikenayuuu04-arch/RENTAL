<?php
    include 'header.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><b>Data Kendaraan</b></h4>
        </div>
        <div class="panel-body">
            <a href="kendaraan_tambah.php" class="btn btn-sm btn-info pull-right">Tambah</a>
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nomor Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Tipe Kendaraan</th>
                    <th>Harga Kendaraan Perhari</th>
                    <th width="15%">OPSI</th>
                </tr>
                <?php
                    include '../koneksi.php';
                    $data = mysqli_query($koneksi,"select * from kendaraan");
                    $no = 1;
                    while ($d=mysqli_fetch_array($data)) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['kendaraan_nomor']; ?></td>
                        <td><?php echo $d['kendaraan_nama']; ?></td>
                        <td><?php echo $d['kendaraan_tipe']; ?></td>
                        <td><?php echo "Rp.".number_format($d['kendaraan_harga_perhari']); ?></td>
                        <td>
                            <a href="kendaraan_edit.php?nomor=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-sm btn-info">Edit</a>
                            <a href="kendaraan_hapus.php?nomor=<?php echo $d['kendaraan_nomor']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>                    