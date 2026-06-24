<?php
session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard Reservasi Futsal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<style>
body{
    background:#f4f6f9;
    font-family:Arial, sans-serif;
}
.sidebar{
    width:250px;
    height:100vh;
    background:#081b3a;
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

table td{
padding:12px;
font-weight:600;
}
table td:hover{
background:#f1f5f9;
cursor:pointer;
}
.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:15px 25px;
}
.sidebar a:hover{
    background:#16a34a;
}
.content{
    margin-left:250px;
    padding:25px;
}
.card-dashboard{
    border:none;
    border-radius:15px;
}
.card-dashboard h2{
    font-weight:bold;
}
.card{
    border:none;
    border-radius:15px;
}
.lapangan-img{
    width:100%;
    border-radius:10px;
}
.status{
    background:#16a34a;
    color:white;
    padding:4px 10px;
    border-radius:20px;
    font-size:12px;
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
<a href="lapangan.php">
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
<h2>Dashboard Admin</h2>
<div class="row mt-4">
<div class="col-md-3">
<div class="card shadow border-0">
<div class="card-body d-flex align-items-center">
<div class="bg-success text-white rounded p-3 me-3">
<i class="fas fa-calendar-check fa-2x"></i>
</div>
<div>
<p class="mb-1 text-muted">Total Reservasi</p>
<h2>128</h2>
<small class="text-success">
↑ 18% dari bulan lalu
</small>
</div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card shadow border-0">
<div class="card-body d-flex align-items-center">
<div class="bg-primary text-white rounded p-3 me-3">
<i class="fas fa-money-bill-wave fa-2x"></i>
</div>
<div>
<p class="mb-1 text-muted">Pendapatan</p>
<h2>Rp 8.750.000</h2>
<small class="text-success">
↑ 24% dari bulan lalu
</small>
</div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card shadow border-0">
<div class="card-body d-flex align-items-center">
<div style="background:#7c3aed;"
class="text-white rounded p-3 me-3">
<i class="fas fa-users fa-2x"></i>
</div>
<div>
<p class="mb-1 text-muted">Pelanggan</p>
<h2>356</h2>
<small class="text-success">
↑ 15% dari bulan lalu
</small>
</div>
</div>
</div>
</div>
<div class="col-md-3">
<div class="card shadow border-0">
<div class="card-body d-flex align-items-center">
<div class="bg-warning text-white rounded p-3 me-3">
<i class="fas fa-clock fa-2x"></i>
</div>
<div>
<p class="mb-1 text-muted">
Reservasi Hari Ini
</p>
<h2>12</h2>
<small class="text-muted">
Lihat detail jadwal →
</small>
</div>
</div>
</div>
</div>
</div>
<div class="row mt-4">
<div class="col-md-7">
<div class="card shadow p-3">
<h5>Grafik Reservasi</h5>
<canvas id="grafikReservasi"></canvas>
</div>
</div>
<div class="col-md-5">
<div class="card shadow p-4">
<div class="d-flex justify-content-between mb-3">
<h4>Reservasi Hari Ini</h4>
<a href="#"
style="color:#16a34a;text-decoration:none;">
Lihat semua
</a>
</div>
<table class="table align-middle">
<tr>
<td><b>09:00 - 10:00</b></td>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png"
width="30" style="margin-right:10px;">
FC Thunder
</td>
<td>Lapangan 1</td>
<td>
<span class="badge bg-success">
Confirmed
</span>
</td>
</tr>
<tr>
<td><b>10:00 - 11:00</b></td>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png"
width="30" style="margin-right:10px;">
The Warriors
</td>
<td>Lapangan 2</td>
<td>
<span class="badge bg-primary">
Upcoming
</span>
</td>
</tr>
<tr>
<td><b>11:00 - 12:00</b></td>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png"
width="30" style="margin-right:10px;">
Kawan Lama FC
</td>
<td>Lapangan 1</td>
<td>
<span class="badge bg-primary">
Upcoming
</span>
</td>
</tr>
<tr>
<td><b>13:00 - 14:00</b></td>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png"
width="30" style="margin-right:10px;">
Tim Gabut FC
</td>
<td>Lapangan 3</td>
<td>
<span class="badge bg-primary">
Upcoming
</span>
</td>
</tr>
<tr>
<td><b>14:00 - 15:00</b></td>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png"
width="30" style="margin-right:10px;">
Anak Muda FC
</td>
<td>Lapangan 2</td>
<td>
<span class="badge bg-primary">
Upcoming
</span>
</td>
</tr>
<tr>
<td><b>20:00 - 21:00</b></td>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png"
width="30" style="margin-right:10px;">
Night Futsal Club
</td>
<td>Lapangan 1</td>
<td>
<span class="badge bg-warning text-dark">
Pending
</span>
</td>
</tr>
</table>
</div>
</div>
</div>
<div class="row mt-4">
<div class="col-md-4">
<div class="card shadow p-3">
<h5>Lapangan</h5>
<img
src="https://images.unsplash.com/photo-1518604666860-9ed391f76460?w=800"
class="lapangan-img">
<p class="mt-3">
Lapangan A
</p>
<span class="badge bg-success">
Tersedia
</span>
</div>
</div>
<div class="col-md-4">
<div class="card shadow p-3">

    

<div class="d-flex justify-content-between mb-3">

<h5>Reservasi Terbaru</h5>
<a href="#" style="text-decoration:none;color:green;">
Lihat semua
</a>
</div>
<table class="table table-borderless">
<tr>
<td width="50">
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png" width="35">
</td>
<td>
<b>FC Victory</b><br>
<small class="text-muted">
Lapangan 1 • 21 Mei 2025 • 19:00
</small>
</td>
<td align="right">
<b>Rp 450.000</b><br>
<span class="badge bg-success">
Lunas
</span>
</td>
</tr>
<tr>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png" width="35">
</td>
<td>
<b>Sahabat FC</b><br>
<small class="text-muted">
Lapangan 2 • 21 Mei 2025 • 17:00
</small>
</td>
<td align="right">
<b>Rp 400.000</b><br>
<span class="badge bg-success">
Lunas
</span>
</td>
</tr>
<tr>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png" width="35">
</td>
<td>
<b>Brotherhood</b><br>
<small class="text-muted">
Lapangan 3 • 21 Mei 2025 • 15:00
</small>
</td>
<td align="right">
<b>Rp 350.000</b><br>
<span class="badge bg-success">
Lunas
</span>
</td>
</tr>
<tr>
<td>
<img src="https://cdn-icons-png.flaticon.com/512/53/53283.png" width="35">
</td>
<td>
<b>Fun Futsal</b><br>
<small class="text-muted">
Lapangan 1 • 20 Mei 2025 • 21:00
</small>
</td>
<td align="right">
<b>Rp 450.000</b><br>
<span class="badge bg-success">
Lunas
</span>
</td>
</tr>
</table>

</div>
</div>
<div class="col-md-4">
<div class="card shadow p-3">
<div class="d-flex justify-content-between align-items-center mb-3">
<h5>Kalender Reservasi</h5>
<select class="form-select" style="width:140px">
<option>januari 2026</option>
<option>februari 2026</option>
<option>maret 2026</option>
<option>april 2026</option>
<option>mei 2026</option>
<option>Juni 2026</option>
<option>Juli 2026</option>
<option>agustus 2026</option>
<option>september 2026</option>
<option>oktober 2026</option>
<option>november 2026</option>
<option>desember 2026</option>
</select>
</div>

<table class="table text-center">
<tr>
<th>Min</th>
<th>Sen</th>
<th>Sel</th>
<th>Rab</th>
<th>Kam</th>
<th>Jum</th>
<th>Sab</th>
</tr>
<tr>
<td></td>
<td></td>
<td></td>
<td></td>
<td>1</td>
<td>2</td>
<td>3</td>
</tr>
<tr>
<td>4</td>
<td>5</td>
<td>6</td>
<td>7</td>
<td>8</td>
<td>9</td>
<td>10</td>
</tr>
<tr>
<td>11</td>
<td>12</td>
<td>13</td>
<td>14</td>
<td>15</td>
<td>16</td>
<td>17</td>
</tr>
<tr>
<td>18</td>
<td>19</td>
<td>20</td>
<td style="
background:#22c55e;
color:white;
border-radius:10px;
font-weight:bold;">
21
</td>
<td>22</td>
<td>23</td>
<td>24</td>
</tr>
<tr>
<td>25</td>
<td>26</td>
<td>27</td>
<td>28</td>
<td>29</td>
<td>30</td>
<td>31</td>
</tr>
</table>
</div>
</div>
</div>
<div class="card shadow mt-4 p-4 text-center">
<h4>
⚽ Futsal bukan hanya soal menang,
tetapi juga tentang kebersamaan dan sportivitas!
</h4>
</div>
</div>
<script>
const ctx =
document.getElementById('grafikReservasi');
new Chart(ctx,{
type:'line',
data:{
labels:[
'Sen',
'Sel',
'Rab',
'Kam',
'Jum',
'Sab',
'Min'
],
datasets:[{
label:'Reservasi',
data:[12,19,28,21,23,28,22],
fill:true,
borderWidth:3
}]
}
});
</script>
</body>
</html>