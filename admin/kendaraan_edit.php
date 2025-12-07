<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Kendaraan</h4>
            </div>
            <div class="panel-body">

                <?php
                include '../koneksi.php';

                $nomor = $_GET['nomor'];

                $data = mysqli_query($koneksi, "SELECT * FROM kendaraan WHERE kendaraan_nomor='$nomor'");
                while($d = mysqli_fetch_array($data)){
                ?>

                <form method="POST" action="kendaraan_update.php">

                    <input type="hidden" name="nomor_lama" value="<?php echo $d['kendaraan_nomor']; ?>">

                    <div class="form-group">
                        <label>Nomor Kendaraan</label>
                        <input type="text" name="nomor" class="form-control"
                               value="<?php echo $d['kendaraan_nomor']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Nama Kendaraan</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?php echo $d['kendaraan_nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Tipe Kendaraan</label>
                        <input type="text" name="tipe" class="form-control"
                               value="<?php echo $d['kendaraan_tipe']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Harga Perhari</label>
                        <input type="number" name="harga" class="form-control"
                               value="<?php echo $d['kendaraan_harga_perhari']; ?>">
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Simpan">

                </form>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
