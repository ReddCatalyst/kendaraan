<?php
include 'config/config.php';

$result = mysqli_query($conn, "SELECT * FROM kendaraan");

$ganjil = [];
$genap = [];

while ($row = mysqli_fetch_assoc($result)) {
    preg_match('/(\d+)/', $row['plat_nomor'], $matches);
    $last = isset($matches[0]) ? substr($matches[0], -1) : null;

    if ($last !== null) {
        if ($last % 2 == 0) {
            $genap[] = $row;
        } else {
            $ganjil[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Kendaraan</title>
    <link rel="stylesheet" href="css/list.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Kendaraan Berdasarkan Plat</h2>

        <div class="table-section">
            <h3>Plat Ganjil</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama Pemilik</th>
                        <th>Nomor Kendaraan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ganjil as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nama_pemilik']) ?></td>
                            <td><?= htmlspecialchars($item['plat_nomor']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="table-section">
            <h3>Plat Genap</h3>
            <table>
                <thead>
                    <tr>
                        <th>Nama Pemilik</th>
                        <th>Nomor Kendaraan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($genap as $item): ?>
                        <tr>
                            <td><?= htmlspecialchars($item['nama_pemilik']) ?></td>
                            <td><?= htmlspecialchars($item['plat_nomor']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="link">
            <a href="index.php">← Kembali ke Form</a>
        </div>
    </div>
</body>
</html>
