<?php
include "koneksi.php";

$data = mysqli_query($koneksi,"SELECT * FROM reservasi");

$total = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM reservasi"));
$booking = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM reservasi WHERE status='Booking'"));
$confirmed = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM reservasi WHERE status='Confirmed'"));
$selesai = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM reservasi WHERE status='Selesai'"));
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Data Reservasi</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
    font-family:Arial,sans-serif;
}
    table td,
    table th{
        text-align:center;
        vertical-align: middle;
    }

.sidebar{
    width:250px;
    height:100vh;
    background:#071d3a;
    position:fixed;
    left:0;
    top:0;
    color:white;
}

.logo{
    padding:25px;
    font-size:28px;
    font-weight:bold;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
}

.sidebar a:hover{
    background:#22c55e;
}

.content{
    margin-left:250px;
    padding:30px;
}

.card-stat{
    border:none;
    border-radius:15px;
}

.table{
    background:white;
}

.badge-booking{
    background:#ffc107;
    color:black;
}

.badge-confirmed{
    background:#198754;
}

.badge-selesai{
    background:#0d6efd;
}

</style>

</head>
<body>

<div class="sidebar">

<div class="logo">
⚽ Reservasi Futsal
</div>

<a href="dashboard.php">🏠 Dashboard</a>

<a href="lapangan.php">⚽ Data Lapangan</a>

<a href="reservasi.php" style="background:#22c55e;">
📅 Reservasi
</a>

<a href="logout.php">🚪 Logout</a>

</div>

<div class="content">

<div class="d-flex justify-content-between align-items-center mb-4">

<div>
<h2><b>Data Reservasi</b></h2>
<p class="text-muted">
Kelola semua data reservasi futsal
</p>
</div>

<a href="tambah_reservasi.php"
class="btn btn-success">
+ Tambah Reservasi
</a>

</div>

<div class="row mb-4">

<div class="col-md-3">
<div class="card card-stat shadow">
<div class="card-body text-center">
<h5>Total Reservasi</h5>
<h1><?= $total ?></h1>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-stat shadow">
<div class="card-body text-center">
<h5>Booking</h5>
<h1 class="text-warning"><?= $booking ?></h1>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-stat shadow">
<div class="card-body text-center">
<h5>Confirmed</h5>
<h1 class="text-success"><?= $confirmed ?></h1>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card card-stat shadow">
<div class="card-body text-center">
<h5>Selesai</h5>
<h1 class="text-primary"><?= $selesai ?></h1>
</div>
</div>
</div>

</div>

<div class="card shadow">

<div class="card-body p-0">

<table class="table table-hover align-middle mb-0 w-100">

<thead class="table-dark">

<tr>
<th>No</th>
<th>Nama Penyewa</th>
<th>No HP</th>
<th>Lapangan</th>
<th>Tanggal</th>
<th>Jam</th>
<th>Jam Selesai</th>
<th>Durasi</th>
<th>Total harga</th>
<th>Status</th>
<th>Aksi</th>
</tr>

</thead>

<tbody>

<?php
$no=1;
while($row=mysqli_fetch_assoc($data)){
?>

<tr>

<td><?= $no++ ?></td>
<td><?= $row['nama_penyewa'] ?></td>
<td><?= $row['no_hp'] ?></td>
<td><?= $row['lapangan'] ?></td>
<td><?= $row['tanggal'] ?></td>
<td><?= $row['jam'] ?></td>
<td>
<?php
$jam_selesai = date(
    'H:i',
    strtotime($row['jam']) + ($row['durasi'] * 3600)
);
echo $jam_selesai;
?>
</td>
<td>
    <span class="badge bg-info">
        <?= $row['durasi'] ?> Jam
    </span>
</td>
<td>
Rp <?= number_format($row['total_harga'],0,',','.') ?>
</td>
<td>


<?php
if($row['pembayaran']=="Lunas"){
    echo "<span class='badge bg-success'>Lunas</span>";
}else{
    echo "<span class='badge bg-danger'>Belum Bayar</span>";
}
?>
</td>
<td>
<?php
if($row['status']=="Booking"){
    echo "<span class='badge badge-booking'>Booking</span>";
}
elseif($row['status']=="Confirmed"){
    echo "<span class='badge badge-confirmed'>Confirmed</span>";
}
elseif($row['status']=="Selesai"){
    echo "<span class='badge badge-selesai'>Selesai</span>";
}
else{
    echo "<span class='badge bg-secondary'>".$row['status']."</span>";
}
?>

</td>

<td>
<a href="bayar.php?id=<?= $row['id'] ?>"
class="btn btn-success btn-sm">
Lunas
</a>
<a href="edit_reservasi.php?id=<?= $row['id'] ?>"
class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus_reservasi.php?id=<?= $row['id'] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin ingin menghapus data ini?')">
Hapus
</a>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
</body>
</html>