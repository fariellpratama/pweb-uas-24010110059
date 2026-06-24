<?php
include "koneksi.php";

$cari = isset($_GET['cari']) ? $_GET['cari'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';

$sql = "SELECT * FROM lapangan WHERE nama_lapangan LIKE '%$cari%'";

if($status != ''){
    $sql .= " AND status='$status'";
}

$data = mysqli_query($koneksi,$sql);

$total = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM lapangan")
);

$tersedia = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM lapangan WHERE status='Tersedia'")
);

$maintenance = mysqli_num_rows(
mysqli_query($koneksi,"SELECT * FROM lapangan WHERE status='Maintenance'")
);

$tidak_tersedia = 0;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Data Lapangan</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<style>

body{
    background:#f5f6fa;
    font-family:Arial;
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
    font-size:30px;
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

.card-lapangan{
    border:none;
    border-radius:20px;
    overflow:hidden;
}

.card-lapangan img{
    width:100%;
    height:250px;
    object-fit:cover;
}

.status{
    position:absolute;
    top:15px;
    left:15px;
    padding:7px 15px;
    border-radius:20px;
    color:white;
    font-size:14px;
}

.tersedia{
    background:#22c55e;
}

.maintenance{
    background:#f97316;
}

.info{
    background:white;
    padding:20px;
}

.footer-box{
    background:#eef8f0;
    border-radius:20px;
    padding:30px;
}

</style>
</head>
<body>

<div class="sidebar">

<div class="logo">
⚽ Reservasi Futsal
</div>

<a href="dashboard.php">
<i class="fa fa-home"></i> Dashboard
</a>

<a href="lapangan.php" style="background:#22c55e;">
<i class="fa fa-futbol"></i> Data Lapangan
</a>

<a href="reservasi.php">
<i class="fa fa-calendar"></i> Reservasi
</a>

<a href="logout.php">
<i class="fa fa-sign-out-alt"></i> Logout
</a>

</div>

<div class="content">

<h1><b>Data Lapangan</b></h1>
<p>Kelola semua data lapangan futsal.</p>

<div class="row mb-4">

<div class="col-md-7">
<form method="GET">
<input type="text"
name="cari"
class="form-control form-control-lg"
placeholder="Cari lapangan..."
value="<?= isset($_GET['cari']) ? $_GET['cari'] : '' ?>">
</form>

</div>
<div class="col-md-2">

<select class="form-select form-select-lg"
onchange="window.location='lapangan.php?status='+this.value">

<option value="">Semua Status</option>

<option value="Tersedia">Tersedia</option>

<option value="Maintenance">Maintenance</option>

</select>

</div>
<div class="col-md-3">
<a href="tambah_lapangan.php"
class="btn btn-success btn-lg w-100">
+ Tambah Lapangan
</a>
</div>

</div>

<div class="row">

<?php while($row = mysqli_fetch_assoc($data)){ ?>

<div class="col-md-3 mb-4">

<div class="card card-lapangan shadow">

<div style="position:relative">

<span class="status <?= strtolower($row['status']) ?>">
<?= $row['status'] ?>
</span>

<img src="futsal.jpg" class="img-fluid">

</div>

<div class="info">

<h3><?= $row['nama_lapangan'] ?></h3>

<p>💰 Rp <?= number_format($row['harga']) ?></p>

<a href="edit_lapangan.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">
Edit
</a>

<a href="hapus_lapangan.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm">
Hapus
</a>

</div>

</div>

</div>

<?php } ?>

</div>

<div class="row text-center">

<div class="col-md-3">
<h5>Total Lapangan</h5>
<h1><?= $total ?></h1>
</div>

<div class="col-md-3">
<h5>Tersedia</h5>
<h1 class="text-success"><?= $tersedia ?></h1>
</div>

<div class="col-md-3">
<h5>Maintenance</h5>
<h1 class="text-warning"><?php echo $maintenance; ?></h1>
</div>


<div class="col-md-3">
<h5>Tidak Tersedia</h5>
<h1 class="text-danger"><?php echo $tidak_tersedia; ?></h1>
</div>


</div>

</div>

</div>

</body>
</html>