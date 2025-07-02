<?php
// Memanggil file penting → wajib ada
require "fungsi.php";

// Memanggil file opsional → boleh ada/tidak
include "halo.php";

// Pemakaian fungsi dari fungsi.php
echo sapa("orell") . PHP_EOL;

echo "Selamat datang di aplikasi kami!";
