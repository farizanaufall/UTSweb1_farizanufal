<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$kode_barang = ["BRG001", "BRG002", "BRG003", "BRG004", "BRG005"];
$nama_barang = ["Beras", "Gula", "popmie", "aqua", "Kopi"];
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Penjualan</title>
</head>
<body>
    <h1>--POLGAN MART--</h1>
    <p>Selamat datang, <?php echo $_SESSION['username']; ?>!</p>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>