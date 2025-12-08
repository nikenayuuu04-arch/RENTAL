<?php 
    include 'header.php';
    include '../koneksi.php';
?>

<div class="container">
    <div class="panel">
        <div class="panel-heading">
            <h4><b>Data Peminjaman Kendaraan</b></h4>
        </div>

        <div class="panel-body">

            <a href="pinjam_tambah.php" class="btn btn-sm btn-info pull-right">Peminjaman Baru</a>
            <br><br>

            <table class="table table-bordered table-striped">
                <tr>
                    <th width="1%">No</th>
                    <th>Peminjam</th>
                    <th>Kendaraan</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th width="20%">OPSI</th>
                </tr>

                <?php
                    $data = mysqli_query($koneksi, "
                        SELECT * FROM pinjam 
                        JOIN user ON pinjam.user_id = user.user_id
                        JOIN kendaraan ON pinjam.kendaraan_nomor = kendaraan.kendaraan_nomor
                        ORDER BY pinjam_id DESC
                    ");

                    $no = 1;
                    while ($d = mysqli_fetch_array($data)) {
                ?>

                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['user_nama']; ?></td>
                    <td><?php echo $d['kendaraan_nama']; ?></td>

                    <td><?php echo $d['tgl_pinjam']; ?></td>
                    <td><?php echo $d['tgl_kembali']; ?></td>
                    <td>
                        <?php
                            $harga = $d['kendaraan_harga_perhari'];

                            $start = strtotime($d['tgl_pinjam']);
                            $end   = strtotime($d['tgl_kembali']);
                            $selisih_hari = ($end - $start) / (60 * 60 * 24);

                            if ($selisih_hari < 1) {
                                $selisih_hari = 1;
                            }

                            $total = $harga * $selisih_hari;

                            echo "Rp.".number_format($total);
                        ?>
                    </td>

                    <td>
                        <?php
                            if ($d['pinjam_status'] == 1) {
                                echo "<div class='label label-success'>READY</div>";
                            } elseif ($d['pinjam_status'] == 2) {
                                echo "<div class='label label-warning'>DIPINJAM</div>";
                            }
                        ?>
                    </td>

                    <td>
                        <a href="pinjam_invoice.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-warning">Invoice</a>
                        <a href="pinjam_edit.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-info">Edit</a>
                        <a href="pinjam_batal.php?id=<?php echo $d['pinjam_id']; ?>" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>

                <?php } ?>

            </table>

        </div>
    </div>
</div>