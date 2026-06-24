<?php

session_start();

if(isset($_POST['login'])){

    $username = $_POST['username'];

    $password = $_POST['password'];

    if($username == "admin" && $password == "123"){

        $_SESSION['login'] = true;

        header("Location: dashboard.php");

        exit;

    }else{

        echo "<script>alert('Username atau Password salah!');</script>";

    }

}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login Futsal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    margin:0;
    height:100vh;
    background:url('https://images.unsplash.com/photo-1511886929837-354d827aae26?w=1600');
    background-size:cover;
    background-position:center;
}

.overlay{
    width:100%;
    height:100vh;
    background:rgba(0,30,80,.65);
}

.left{
    color:white;
    text-align:center;
}

.logo{
    font-size:70px;
}

.card-login{
    background:white;
    border-radius:20px;
    padding:40px;
    box-shadow:0 0 20px rgba(0,0,0,.2);
}

</style>

</head>
<body>

<div class="overlay">

<div class="container h-100">

<div class="row h-100 align-items-center">

<div class="col-md-6 left">

<div class="logo">⚽</div>

<h1><b>FUTSAL FARIZ</b></h1>

<h3>Sistem Reservasi Futsal</h3>

<p>
Temukan lapangan futsal terbaik<br>
dan informasi terlengkap di kota Anda.
</p>

</div>

<div class="col-md-5">

<div class="card-login">

<h1 class="text-center"><b>Login</b></h1>

<p class="text-center text-secondary">
Masuk untuk mengakses sistem
</p>

<form method="POST">

<label>Username</label>

<input
type="text"
name="username"
class="form-control mb-3"
required>

<label>Password</label>

<input
type="password"
name="password"
class="form-control mb-4"
required>

<button
type="submit"
name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

<p class="text-center mt-4 text-secondary">
© 2026 Futsal Fariz
</p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>