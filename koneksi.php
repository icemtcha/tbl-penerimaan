<?php
$host = 'localhost';
$db   = 'db_penerimaan';
$user = 'root';
$pass = '';

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("error: Koneksi database gagal: " . mysqli_connect_error());
}