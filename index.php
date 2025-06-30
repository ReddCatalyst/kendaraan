<?php
include 'config/config.php';

$notif = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $plat = $_POST['plat'];

    if (!empty($nama) && !empty($plat)) {
        $stmt = $conn->prepare("INSERT INTO kendaraan (nama_pemilik, plat_nomor) VALUES (?, ?)");
        $stmt->bind_param("ss", $nama, $plat);
        $stmt->execute();
        $stmt->close();

        $notif = "Data berhasil disimpan.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Kendaraan</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <div class="container">
        <h2>Input Data Kendaraan</h2>

        <?php if (!empty($notif)): ?>
            <div class="notif"><?= $notif ?></div>
        <?php endif; ?>

        <form method="POST">
            <label for="nama">Nama Pemilik:</label>
            <input type="text" name="nama" id="nama" required>

            <label for="plat">Nomor Kendaraan:</label>
            <input type="text" name="plat" id="plat" required>

            <button type="submit">Simpan</button>
        </form>

        <div class="link">
            <a href="list.php">→ Lihat Daftar Kendaraan</a>
        </div>
    </div>
</body>
</html>
