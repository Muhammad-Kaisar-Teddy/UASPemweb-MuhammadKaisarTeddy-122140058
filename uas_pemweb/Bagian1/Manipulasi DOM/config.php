<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'uas_pemweb';

$conn = mysqli_connect($host, $user, $password, $database);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

