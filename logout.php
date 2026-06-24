<?php

session_start();

if(isset($_POST['logout'])){

    session_destroy();

    header("Location: login.php");

    exit;

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="utf-8">

<title>Logout</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{

    background:#f5f6fa;

    font-family:Arial;

}

.box{

    width:700px;

    margin:50px auto;

    background:white;

    border-radius:20px;

    padding:40px;

    text-align:center;

    box-shadow:0 0 15px rgba(0,0,0,.1);

}

.box img{

    width:280px;

}

.btn-logout{

    background:#ef4444;

    color:white;

    border:none;

    padding:15px 40px;

    border-radius:10px;

}

.btn-batal{

    border:1px solid #ddd;

    padding:15px 40px;

    border-radius:10px;

    text-decoration:none;

    color:black;

}

.info{

    background:#eef8f0;

    border:1px solid #cde7d2;

    padding:20px;

    border-radius:15px;

    margin:20px 0;

}

</style>

</head>

<body>

<div class="box">

<img src="https://cdn-icons-png.flaticon.com/512/1828/1828479.png">

<h1><b>Yakin ingin logout?</b></h1>

<p>

Anda akan keluar dari akun

<b>Reservasi Futsal</b>

</p>

<div class="info">

<h4>

<i class="fa fa-shield-alt text-success"></i>

Keamanan akun terjaga

</h4>

<p>

Pastikan Anda logout jika menggunakan perangkat bersama.

</p>

</div>

<form method="POST">

<a href="dashboard.php" class="btn-batal">

Batal

</a>

<button type="submit"

name="logout"

class="btn-logout">

<i class="fa fa-sign-out-alt"></i>

Ya, Logout

</button>

</form>

</div>

</body>

</html>