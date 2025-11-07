<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
$nama_barang = ["Beras", "Gula", "Popmie", "Aqua", "Kopi"];
$harga_barang = [15000, 12000, 11000, 5000, 8000];

$beli = [];
$jumlah = [];
$total = [];
$grandtotal = 0;

$jumlah_item = rand(1, 5);
for ($i = 0; $i < $jumlah_item; $i++) {
    $index = rand(0, 4);
    $beli[] = $nama_barang[$index];
    $jumlah[] = rand(1, 10); 
    $total[] = $harga_barang[$index] * $jumlah[$i];
    $grandtotal += $total[$i];
}

$diskon = 0;
if ($grandtotal < 50000) {
    $diskon = 0.05 * $grandtotal;
} elseif ($grandtotal <= 100000) {
    $diskon = 0.10 * $grandtotal;
} else {
    $diskon = 0.15 * $grandtotal;
}
$total_akhir = $grandtotal - $diskon;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Penjualan</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: #fff;
            color: #333;
            text-align: center;
            padding: 30px;
        }
        h1 {
            color: #0066cc;
            margin-bottom: 5px;
        }
        .container {
            width: 60%;
            margin: auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
            padding: 25px;
            text-align: left;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }
        table th {
            background: #0066cc;
            color: white;
        }
        .total {
            font-weight: bold;
            background: #e9f3ff;
        }
        .btn {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.3s;
        }
        .btn:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <h1>-- POLGAN MART --</h1>
    <p>Selamat datang, <strong><?php echo $_SESSION['username']; ?></strong>!</p>

    <div class="container">
        <h2>Daftar Belanja</h2>
        <table>
            <tr>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
            </tr>
            <?php foreach ($beli as $key => $barang) { ?>
            <tr>
                <td><?php echo $barang; ?></td>
                <td><?php echo $jumlah[$key]; ?></td>
                <td>Rp <?php echo number_format($total[$key], 0, ',', '.'); ?></td>
            </tr>
            <?php } ?>
            <tr class="total">
                <td colspan="2">Total Belanja</td>
                <td>Rp <?php echo number_format($grandtotal, 0, ',', '.'); ?></td>
            </tr>
            <tr>
                <td colspan="2">Diskon</td>
                <td>Rp <?php echo number_format($diskon, 0, ',', '.'); ?></td>
            </tr>
            <tr class="total">
                <td colspan="2">Total Akhir</td>
                <td>Rp <?php echo number_format($total_akhir, 0, ',', '.'); ?></td>
            </tr>
        </table>
    </div>

    <br>
    <a href="logout.php" class="btn">Logout</a>
</body>
</html>
