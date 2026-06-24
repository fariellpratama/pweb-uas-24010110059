<?php
include "koneksi.php";
$id = $_GET['id'];
$data = mysqli_query($koneksi,
"SELECT * FROM lapangan WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
if(isset($_POST['update'])){
    $nama = $_POST['nama_lapangan'];
    $harga = $_POST['harga'];
    $status = $_POST['status'];
    $gambar = $_POST['gambar'];
    mysqli_query($koneksi,"
    UPDATE lapangan
    SET
    nama_lapangan='$nama',
    harga='$harga',
    status='$status',
    gambar='$gambar'
    WHERE id='$id'
    ");
    header("Location: lapangan.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit Lapangan</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<h2>Edit Lapangan</h2>
<form method="POST">
<div class="mb-3">
<label>Nama Lapangan</label>
<input
type="text"
name="nama_lapangan"
class="form-control"
value="<?= $row['nama_lapangan'] ?>">
</div>
<div class="mb-3">
<label>Harga</label>
<input
type="number"
name="harga"
class="form-control"
value="<?= $row['harga'] ?>">
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

<label>Link Gambar</label>

<input

type="text"

name="gambar"

class="form-control"

value="<?= $row['gambar'] ?>">

</div>

<button

type="submit"

name="update"

class="btn btn-primary">

Update

</button>

<a href="lapangan.php"

class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</body>

</html>