<?php
$host = "sql12.freesqldatabase.com";
$user = "sql12787567"; // atau user XAMPP/Laragon kamu
$pass = "UDWHpZLF3T";     // default kosong di XAMPP
$db   = "sql12787567";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
