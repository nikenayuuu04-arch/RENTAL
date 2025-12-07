<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Rental Kendaraan RPL Skanega</title>
    <link rel="stylesheet" type="text/css" href="../aset/css/bootstrap.css">
    <script type="text/javascript" src="../aset/js/jquery.js"></script>
    <script type="text/javascript" src="../aset/js/bootstrap.js"></script>
</head>

<body style="background: #f0f0f0">

    <?php
        session_start();

        if (!isset($_SESSION['user_status'])) {
            header("location:../login.php?pesan=belum_login");
        }
    ?>

    <nav class="navbar navbar-inverse" style="border-radius:0px;">
        <div class="container-fluid">

            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Home</a>
            </div>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">

                    <li><a href="user.php">
                        <i class="glyphicon glyphicon-user"></i> User
                    </a></li>

                    <li><a href="kendaraan.php">
                        <i class="glyphicon glyphicon-road"></i> Kendaraan
                    </a></li>

                    <li><a href="pinjam.php">
                        <i class="glyphicon glyphicon-random"></i> Pinjam
                    </a></li>

                    <li><a href="logout.php">
                        <i class="glyphicon glyphicon-log-out"></i> Logout
                    </a></li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <p style="color:white; margin-top:15px;">
                            Halo, <b><?php echo $_SESSION['username'] ?? 'User'; ?></b>
                        </p>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
