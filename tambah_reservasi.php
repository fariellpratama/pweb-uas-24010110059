<?php
include 'koneksi.php';
if(isset($_POST['simpan'])){
    $nama_penyewa = $_POST['nama_penyewa'];
    $no_hp = $_POST['no_hp'];
    $lapangan = $_POST['lapangan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $status = $_POST['status'];
    $durasi = $_POST['durasi'];
    $total_harga = $durasi * 100000;
mysqli_query($koneksi,"INSERT INTO reservasi
(nama_penyewa,no_hp,lapangan,tanggal,jam,durasi,total_harga,status)
VALUES
('$nama_penyewa','$no_hp','$lapangan','$tanggal','$jam','$durasi','$total_harga','$status')");
    header("Location: reservasi.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Tambah Reservasi</title>
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
📅 Tambah Reservasi
</h2>
<form method="POST">
<div class="mb-3">
<label class="form-label">Nama Penyewa</label>
<input type="text" name="nama_penyewa"
class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">No HP</label>
<input type="text" name="no_hp"
class="form-control" required>
</div>
<div class="mb-3">
<label class="form-label">Lapangan</label>
<input type="text" name="lapangan"
class="form-control" required>
</div>
<div class="row">
<div class="col-md-6">
<div class="mb-3">
<label class="form-label">Tanggal</label>
<input type="date" name="tanggal"
class="form-control" required>
</div>
</div>
<div class="col-md-6">
<div class="mb-3">
<label class="form-label">Jam</label>
<input type="time" name="jam"
class="form-control" required>
</div>
</div>
<div class="col-md-6">
<div class="mb-3">
<label class="form-label">Durasi</label>

<select name="durasi" class="form-select">
<option value="1">1 Jam</option>
<option value="2">2 Jam</option>
<option value="3">3 Jam</option>
</select>

</div>
</div>
</div>
<div class="mb-4">
<label class="form-label">Status</label>
<select name="status" class="form-select">
<option value="Booking">Booking</option>
<option value="Confirmed">Confirmed</option>
<option value="Selesai">Selesai</option>
</select>
</div>
<button type="submit"
name="simpan"
class="btn btn-success">
💾 Simpan
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