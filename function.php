<?php

function luasLingkaran($jari) {
    $phi = 3.14;
    return $phi * $jari * $jari;
}

$hasil = luasLingkaran(7);
echo "Luas lingkaran dengan jari jari 7 = " . $hasil . PHP_EOL;
