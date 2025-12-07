<?php
    include 'header.php';
    include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><b>Data Kendaraan</b></h4>
        </div>
        <div class="panel-body">
            <br><br>
            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Nomor Kendaraan</th>
                    <th>Nama Kendaraan</th>
                    <th>Tipe Kendaraan</th>
                    <th>Harga Kendaraan Perhari</th>
                    <th>Status</th>
                </tr>

                <?php
                    $data = mysqli_query($koneksi,"SELECT * FROM kendaraan");
                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {

                        $id_kendaraan = $d['kendaraan_nomor'];

                        $cek = mysqli_query($koneksi,
                            "SELECT * FROM pinjam 
                             WHERE kendaraan_nomor='$id_kendaraan' 
                             AND pinjam_status = 2");

                        if (mysqli_num_rows($cek) > 0) {
                            $status = "<span class='label label-warning'>DIPINJAM</span>";
                        } else {
                            $status = "<span class='label label-success'>READY</span>";
                        }
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $d['kendaraan_nomor']; ?></td>
                        <td><?php echo $d['kendaraan_nama']; ?></td>
                        <td><?php echo $d['kendaraan_tipe']; ?></td>
                        <td><?php echo "Rp " . number_format($d['kendaraan_harga_perhari']); ?></td>
                        <td><?php echo $status; ?></td>
                    </tr>
                <?php
                    }
                ?>
            </table>
        </div>
    </div>
</div>                    