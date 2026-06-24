<?php

include "koneksi.php";

if(isset($_POST['simpan'])){

    $nama = $_POST['nama_lapangan'];

    $harga = $_POST['harga'];

    $status = $_POST['status'];

    $gambar = $_POST['gambar'];

    mysqli_query($koneksi,"

    INSERT INTO lapangan

    (nama_lapangan,harga,status,gambar)

    VALUES

    ('$nama','$harga','$status','$gambar')

    ");

    header("Location: lapangan.php");

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Tambah Lapangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Tambah Lapangan</h2>

<form method="POST">

<div class="mb-3">

<label>Nama Lapangan</label>

<input type="text"

name="nama_lapangan"

class="form-control"

required>

</div>

<div class="mb-3">

<label>Harga</label>

<input type="number"

name="harga"

class="form-control"

required>

</div>

<div class="mb-3">

<label>Status</label>

<select

name="status"

class="form-control">

<option value="Tersedia">

Tersedia

</option>

<option value="Maintenance">

Maintenance

</option>

</select>

</div>

<div class="mb-3">


placeholder="https://...">

</div>

<button

type="submit"

name="simpan"

class="btn btn-success">

Simpan

</button>

<a href="lapangan.php"

class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</body>

</html>