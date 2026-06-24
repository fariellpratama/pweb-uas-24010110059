<?php

$koneksi = mysqli_connect(
    "localhost",
    "root",
    "",
    "reservasi_futsal"
);

if(!$koneksi){
    die("Koneksi gagal");
}

?>