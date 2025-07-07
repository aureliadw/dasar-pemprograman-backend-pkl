<?php 

//Aplikasi pemesanan makanan/minuman

 $menu = [
  "Nasi Goreng" => 15000,
  "Ayam Bakar" => 12000,
  "Ayam Goreng" => 13000,
  "Teh Manis" => 7000,
  "Es Jeruk" => 7000
];

echo "=== Daftar Menu ===" . PHP_EOL;
$no1=1;

    foreach($menu as $namaMenu => $harga){
    echo "$no1. $namaMenu - Rp.". number_format($harga, 0,',','.') . PHP_EOL;
    $no1++;
}

$inputMenu = readline("Masukkan nama menu yang dibeli:");
$jumlahPorsi = readline("Masukkan jumlah porsi:");
$jumlahUang = readline("Masukkan jumlah uang yang dibayar:");

if (array_key_exists($inputMenu, $menu)){

}else{
    echo "tidak valid, harus yang ada sesuai di menu";
    exit;
}

if (is_numeric($jumlahPorsi) && $jumlahPorsi > 0){
    $jumlahPorsi = (int)$jumlahPorsi;
}else{
    if (!is_numeric($jumlahPorsi)) {
        echo "tidak valid, jumlah harus angka!";
    } else {
        echo "tidak valid, jumlah harus lebih besar dari 0!";
    }
    exit;
}

if (is_numeric($jumlahUang) && $jumlahUang > 0){
    $jumlahUang = (int)$jumlahUang;
}else{
    if (!is_numeric($jumlahUang)) {
        echo "tidak valid, jumlah harus angka!";
    } else {
        echo "tidak valid, jumlah harus lebih besar dari 0!";
    }
    exit;
}

$jumlahPorsi = (int)$jumlahPorsi;
$jumlahUang = (int)$jumlahUang;

$harga = $menu[$inputMenu];
$totalHarga = $harga * $jumlahPorsi;

if  ($jumlahUang < $totalHarga){
    echo "Uang tidak cukup untuk membayar total harga!" . PHP_EOL;
    exit;
}

$kembalian = $jumlahUang - $totalHarga;

echo "=== Rincian Pemesanan ===" . PHP_EOL;
echo "Menu          : $inputMenu" . PHP_EOL;
echo "Harga/porsi   : Rp.". number_format($harga, 0,',','.') . PHP_EOL;
echo "Jumlah Porsi  : $jumlahPorsi" . PHP_EOL;
echo "Total harga   : Rp " . number_format($totalHarga, 0, ',', '.') . PHP_EOL;
echo "Uang dibayar  : Rp " . number_format($jumlahUang, 0, ',', '.') . PHP_EOL;
echo "Kembalian     : Rp " . number_format($kembalian, 0, ',', '.') . PHP_EOL;