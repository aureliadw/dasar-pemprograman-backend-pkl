<?php
// Global Scope
$nama = "Orell";

function tampilNama() {
    // mencoba akses variabel global tanpa 'global'
    echo "Tanpa global: ";
    // echo $nama; // ERROR: Undefined variable
}

function tampilNamaDenganGlobal() {
    global $nama;
    echo "Dengan global: $nama <br>"; // BERHASIL: akses variabel global
}

function contohLocalScope() {
    $pesan = "Ini variabel lokal";
    echo "Local Scope: $pesan <br>"; // BERHASIL
    // variabel $pesan hanya hidup di dalam fungsi ini
}

function contohStaticScope() {
    static $angka = 1; // nilai disimpan antar pemanggilan
    echo "Static: $angka <br>";
    $angka++;
}

// =========================
// Pemanggilan fungsi:
tampilNama();               // Tidak menampilkan apa-apa (variabel global tak dikenali)
echo "<br>";
tampilNamaDenganGlobal();  // Menampilkan: "Dengan global: Orell"
contohLocalScope();        // Menampilkan: "Local Scope: Ini variabel lokal"
echo "<br>";

contohStaticScope(); // 1
contohStaticScope(); // 2
contohStaticScope(); // 3
?>
