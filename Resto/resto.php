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

while (true) {
    $inputDiskon = readline("Masukkan diskon: ");
    if ($inputDiskon === "") {
        $diskonPersen = 0;
        break;
    }
    if (ctype_digit($inputDiskon) && (int)$inputDiskon <= 100) {
        $diskonPersen = (int)$inputDiskon;
        break;
    }
    echo "Diskon maksimum 100%, tidak boleh negatif!" . PHP_EOL;
}

$namaMenuDipilih = $daftarMenu[$inputMenu - 1];
$harga = $menu[$namaMenuDipilih];
$totalHarga = $harga * $jumlahPorsi;

$diskon = $totalHarga * ($diskonPersen / 100);
$totalSetelahDiskon = $totalHarga - $diskon;

$ppn = round($totalSetelahDiskon * 0.11);
$totalBayar =  $totalSetelahDiskon + $ppn;

if  ($jumlahUang < $totalBayar){
    echo "Maaf, uang yang Anda masukkan belum mencukupi total bayar (termasuk PPN). Silahkan cek kembali." . PHP_EOL;
    exit;
}

$kembalian = $jumlahUang - $totalBayar;

echo "=== Rincian Pemesanan ===" . PHP_EOL;
echo "Menu                  : $namaMenuDipilih" . PHP_EOL;
echo "Harga/porsi           : " . formatRupiah($harga) . PHP_EOL;
echo "Jumlah Porsi          : $jumlahPorsi" . PHP_EOL;
echo "Diskon                : {$diskonPersen}%" . PHP_EOL;
echo "Total diskon          : " . formatRupiah($diskon) . PHP_EOL;
echo "Harga setelah diskon  : " . formatRupiah($totalSetelahDiskon) . PHP_EOL;
echo "PPN (11%)             : " . formatRupiah($ppn) . PHP_EOL;
echo "Total bayar           : " . formatRupiah($totalBayar) . PHP_EOL;
echo "Uang dibayar          : " . formatRupiah($jumlahUang) . PHP_EOL;
echo "Kembalian             : " . formatRupiah($kembalian) . PHP_EOL;

$lanjut = readline("Ingin transaksi lagi? (y/n): ");

if (strtolower($lanjut) == 'n') {
    echo "Terimakasih! Sampai jumpa." . PHP_EOL;
    break;
}
}

