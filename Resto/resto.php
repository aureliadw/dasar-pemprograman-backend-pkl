<?php 

//Aplikasi pemesanan makanan/minuman

 include 'menu.php';

$daftarMenu = array_keys($menu);

function formatRupiah($angka){
    return "Rp." . number_format($angka, 0,',','.');
}

while (true){
echo "    === Daftar Menu ===" . PHP_EOL;
$no1=1;

    foreach($menu as $namaMenu => $harga){
    $namaMenu = str_pad($namaMenu, 15); 
    echo "$no1. $namaMenu - " . formatRupiah($harga) . PHP_EOL;
    $no1++;
}

while (true) {
    $inputMenu = readline("Pilih menu (angka): ");
    if (ctype_digit($inputMenu) && $inputMenu >= 1 && $inputMenu <= count($daftarMenu)) {
        break; 
    }
    echo "Tidak valid! Pilih angka antara 1 sampai " . count($daftarMenu) . PHP_EOL;
}

while (true) {
    $jumlahPorsi = readline("Masukkan jumlah porsi: ");
    if (ctype_digit($jumlahPorsi) && $jumlahPorsi > 0) {
        $jumlahPorsi = (int)$jumlahPorsi;
        break;
    }
    echo "Jumlah porsi harus bilangan bulat positif!" . PHP_EOL;
}

while (true) {
    $jumlahUang = readline("Masukkan jumlah uang yang dibayar: ");
    if (ctype_digit($jumlahUang) && $jumlahUang > 0) {
        $jumlahUang = (int)$jumlahUang;
        break;
    }
    echo "Jumlah uang harus bilangan bulat positif!" . PHP_EOL;
}

$jumlahPorsi = (int)$jumlahPorsi;
$jumlahUang = (int)$jumlahUang;

$namaMenuDipilih = $daftarMenu[$inputMenu - 1];
$harga = $menu[$namaMenuDipilih];
$totalHarga = $harga * $jumlahPorsi;

if  ($jumlahUang < $totalHarga){
    echo "Uang tidak cukup untuk membayar total harga!" . PHP_EOL;
    exit;
}

$kembalian = $jumlahUang - $totalHarga;

echo "=== Rincian Pemesanan ===" . PHP_EOL;
echo "Menu          : $namaMenuDipilih" . PHP_EOL;
echo "Harga/porsi   : " . formatRupiah($harga) . PHP_EOL;
echo "Jumlah Porsi  : $jumlahPorsi" . PHP_EOL;
echo "Total harga   : " . formatRupiah($totalHarga) . PHP_EOL;
echo "Uang dibayar  : " . formatRupiah($jumlahUang) . PHP_EOL;
echo "Kembalian     : " . formatRupiah($kembalian) . PHP_EOL;

$lanjut = readline("Ingin transaksi lagi? (y/n): ");

if (strtolower($lanjut) == 'n') {
    echo "Terimakasih! Sampai jumpa." . PHP_EOL;
    break;
}
}

