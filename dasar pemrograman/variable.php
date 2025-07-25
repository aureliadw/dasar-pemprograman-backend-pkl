<?php
// Variabel
$nama = "Orell";
$umur = 17;
$tinggi = 1.65; // Float
$aktif = true;  // Boolean

// Konstanta
define("NAMA_SEKOLAH", "SMK Negeri 2");

// Tampilkan output
echo "Nama saya: $nama\n";
echo "Umur saya: $umur tahun\n";
echo "Tinggi badan: $tinggi meter\n";
echo "Aktif sekolah? " . ($aktif ? "Ya" : "Tidak") . "\n";
echo "Sekolah: " . NAMA_SEKOLAH . "\n";
?>
