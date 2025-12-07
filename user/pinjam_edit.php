<?php
    include 'header.php';
    include '../koneksi.php';
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
                if (!isset($_GET['id'])) {
                    echo "<div class='alert alert-danger'>ID tidak ditemukan.</div>";
                    exit;
                }

                $id = $_GET['id'];

                $data = mysqli_query($koneksi, "SELECT * FROM pinjam WHERE pinjam_id='$id' LIMIT 1");
                if (!$data) {
                    echo "<div class='alert alert-danger'>Query error: ".mysqli_error($koneksi)."</div>";
                    exit;
                }

                $d = mysqli_fetch_array($data);
                if (!$d) {
                    echo "<div class='alert alert-warning'>Data pinjam tidak ditemukan.</div>";
                    exit;
                }
                ?>

                <form method="POST" action="pinjam_update.php">

                    <input type="hidden" name="id_lama" value="<?php echo $d['pinjam_id']; ?>">
                    <input type="hidden" name="user_id" value="<?php echo $d['user_id']; ?>">
                    <input type="hidden" name="pinjam_status" value="<?php echo $d['pinjam_status']; ?>">

                    <div class="form-group">
                        <label>Pilih Kendaraan</label>
                        <select name="kendaraan_nomor" class="form-control" required>
                            <option value="">-- Pilih Kendaraan --</option>
                            <?php
                                $kendaraan = mysqli_query($koneksi, "SELECT * FROM kendaraan ORDER BY kendaraan_nama ASC");
                                while ($k = mysqli_fetch_array($kendaraan)) {
                                    $selected = ($k['kendaraan_nomor'] == $d['kendaraan_nomor']) ? 'selected' : '';
                            ?>
                                <option value="<?php echo htmlspecialchars($k['kendaraan_nomor']); ?>" <?php echo $selected; ?>>
                                    <?php echo htmlspecialchars($k['kendaraan_nomor']." - ".$k['kendaraan_nama']); ?>
                                </option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="date" name="tgl_pinjam" class="form-control"
                               value="<?php echo htmlspecialchars($d['tgl_pinjam']); ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="date" name="tgl_kembali" class="form-control"
                               value="<?php echo htmlspecialchars($d['tgl_kembali']); ?>" required>
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Update">

                </form>

            </div>
        </div>
    </div>
</div>
