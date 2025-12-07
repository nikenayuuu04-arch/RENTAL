<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit Data Pinjam</h4>
            </div>
            <div class="panel-body">

                <?php
                include '../koneksi.php';

                $id = $_GET['id'];

                $data = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_id='$id'");
                $d = mysqli_fetch_array($data);
                ?>

                <form method="POST" action="pinjam_update.php">

                    <input type="hidden" name="id_lama" value="<?php echo $d['pinjam_id']; ?>">

                    <div class="form-group">
                        <label>Pilih Kendaraan</label>
                        <select name="kendaraan_nomor" class="form-control">
                            <option value="">-- Pilih Kendaraan --</option>
                            <?php
                                $kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan");
                                while($k = mysqli_fetch_array($kendaraan)){
                            ?>
                                <option 
                                    value="<?php echo $k['kendaraan_nomor']; ?>"
                                    <?php if($k['kendaraan_nomor'] == $d['kendaraan_nomor']) echo "selected"; ?>>

                                    <?php echo $k['kendaraan_nomor']." - ".$k['kendaraan_nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Pilih User</label>
                        <select name="user_id" class="form-control">
                            <option value="">-- Pilih User --</option>
                            <?php
                                $users = mysqli_query($koneksi, "SELECT * FROM user");
                                while($u = mysqli_fetch_array($users)){
                            ?>
                                <option 
                                    value="<?php echo $u['user_id']; ?>"
                                    <?php if($u['user_id'] == $d['user_id']) echo "selected"; ?>>

                                    <?php echo $u['user_nama']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control"
                               value="<?php echo $d['tgl_pinjam']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control"
                               value="<?php echo $d['tgl_kembali']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Status Pinjam</label>
                        <select name="pinjam_status" class="form-control">
                            <option value="1" <?php if($d['pinjam_status'] == 1) echo "selected"; ?>>READY (1)</option>
                            <option value="2" <?php if($d['pinjam_status'] == 2) echo "selected"; ?>>DIPINJAM (2)</option>
                        </select>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Update">

                </form>

            </div>
        </div>
    </div>
</div>
