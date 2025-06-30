<?php
$host = "localhost";
$user = "root"; // atau user XAMPP/Laragon kamu
$pass = "";     // default kosong di XAMPP
$db   = "kendaraan_db";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
