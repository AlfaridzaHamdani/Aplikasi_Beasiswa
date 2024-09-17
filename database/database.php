<?php
$host = 'localhost';
$dbname = 'beasiswa';
$user = 'root';
$password = '';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
