<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,"SELECT * FROM reservasi WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

    $nama_penyewa = $_POST['nama_penyewa'];
    $no_hp = $_POST['no_hp'];
    $lapangan = $_POST['lapangan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $status = $_POST['status'];

    mysqli_query($koneksi,"UPDATE reservasi SET
    nama_penyewa='$nama_penyewa',
    no_hp='$no_hp',
    lapangan='$lapangan',
    tanggal='$tanggal',
    jam='$jam',
    status='$status'
    WHERE id='$id'");

    header("Location: reservasi.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Edit Reservasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.card{
    border:none;
    border-radius:20px;
}

</style>

</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow">

<div class="card-body p-5">

<h2 class="mb-4">
✏️ Edit Reservasi
</h2>

<form method="POST">

<div class="mb-3">
<label class="form-label">Nama Penyewa</label>
<input type="text"
name="nama_penyewa"
class="form-control"
value="<?= $row['nama_penyewa'] ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">No HP</label>
<input type="text"
name="no_hp"
class="form-control"
value="<?= $row['no_hp'] ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Lapangan</label>
<input type="text"
name="lapangan"
class="form-control"
value="<?= $row['lapangan'] ?>"
required>
</div>

<div class="row">

<div class="col-md-6">
<div class="mb-3">
<label class="form-label">Tanggal</label>
<input type="date"
name="tanggal"
class="form-control"
value="<?= $row['tanggal'] ?>"
required>
</div>
</div>

<div class="col-md-6">
<div class="mb-3">
<label class="form-label">Jam</label>
<input type="time"
name="jam"
class="form-control"
value="<?= $row['jam'] ?>"
required>
</div>
</div>

</div>

<div class="mb-4">
<label class="form-label">Status</label>

<select name="status" class="form-select">

<option value="Booking" <?= $row['status']=="Booking" ? "selected" : "" ?>>
Booking
</option>

<option value="Confirmed" <?= $row['status']=="Confirmed" ? "selected" : "" ?>>
Confirmed
</option>

<option value="Selesai" <?= $row['status']=="Selesai" ? "selected" : "" ?>>
Selesai
</option>

</select>
</div>

<button type="submit"
name="update"
class="btn btn-warning">
💾 Update
</button>

<a href="reservasi.php"
class="btn btn-secondary">
← Kembali
</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>