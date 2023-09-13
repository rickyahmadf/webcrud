<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">
    <div class="container ">
        <div class="sidebar" id="side_nav">
            <!-- <div class="header-box">
                <h1 class="fs-4"> <span class="bg-white text-dark rounded shadow px-2 me-2">Dashboard</span> <span class="text-white">Halaman</span></h1>
            </div>
        </div> -->






<h3>Selamat Datang <?php echo $_SESSION['email']?></h3>
<hr>
<nav class="nav">
    <a href="<?php echo site_url('admin/Login')?>" class="nav-link">Home</a>
    <a href="<?php echo site_url('admin/Warga')?>" class="nav-link">Data Warga</a>
    <a href="<?php echo site_url('admin/Pembayaran')?>" class="nav-link">Jenis Pembayaran</a>
    <a href="<?php echo site_url('admin/Transaksi')?>" class="nav-link">Transaksi</a>
    
    <a href="<?php echo site_url('admin/Login/logout')?>" class="nav-link">Logout</a>
</nav>
<hr>
