<?php

include 'koneksi.php';

$id = $_GET['id'];

mysqli_query($koneksi, "DELETE FROM lapangan WHERE id='$id'");

header("Location: lapangan.php");

?>