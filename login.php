<?php
    session_start();

    include 'koneksi.php';
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $data  = mysqli_query($koneksi, $query);

    if(mysqli_num_rows($data) > 0){
    $d = mysqli_fetch_assoc($data);

    $_SESSION['user_id'] = $d['user_id'];
    $_SESSION['username'] = $d['username'];
    $_SESSION['user_status'] = $d['user_status'];

    if($d['user_status'] == 1){
        header("location:admin/index.php");
    } elseif($d['user_status'] == 2){
        header("location:user/index.php");
    } else {
        echo "Status user tidak dikenal!";
    }

} else {
    echo "<div class='alert alert-danger mt-3'>Login gagal! Username / password salah</div>";
}
?>