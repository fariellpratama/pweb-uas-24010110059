<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM reservasi WHERE id='$id'");

header("Location: reservasi.php");

?>