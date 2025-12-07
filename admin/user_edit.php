<?php
    include 'header.php';
?>

<div class="container">
    <br><br><br>
    <div class="col-md-5 col-md-offset-3">
        <div class="panel">
            <div class="panel-heading">
                <h4>Edit User</h4>
            </div>
            <div class="panel-body">

                <?php
                include '../koneksi.php';

                $id = $_GET['id'];

                $data = mysqli_query($koneksi, "SELECT * FROM user WHERE user_id='$id'");
                while($d = mysqli_fetch_array($data)){
                ?>

                <form method="POST" action="user_update.php">

                    <input type="hidden" name="id_lama" value="<?php echo $d['user_id']; ?>">

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control"
                               value="<?php echo $d['username']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control"
                               placeholder="Masukkan password baru jika ingin diganti">
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" name="nama" class="form-control"
                               value="<?php echo $d['user_nama']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control"
                               value="<?php echo $d['user_alamat']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Status User</label>
                        <input type="text" name="status" class="form-control"
                               value="<?php echo $d['user_status']; ?>">
                    </div>

                    <br>
                    <input type="submit" class="btn btn-primary" value="Update">

                </form>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
