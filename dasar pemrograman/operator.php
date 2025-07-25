<!-- Aritmatika -->
<?php
$a = 10;
$b = 3;

echo "Hasil a + b = " . ($a + $b) . "\n";
echo "Hasil a - b = " . ($a - $b) . "\n";
echo "Hasil a * b = " . ($a * $b) . "\n";
echo "Hasil a / b = " . ($a / $b) . "\n";
echo "Sisa bagi a % b = " . ($a % $b) . "\n";
?>

<!-- Penugasan -->
<?php
$a = 5;
$a += 3;
echo "Nilai a sekarang: $a\n"; // Output: 8
?>

<!-- Perbandingan -->
<?php
$a = 7;
$b = 10;

echo "Apakah a == b? " . ($a == $b ? "Ya" : "Tidak") . "\n";
echo "Apakah a < b? " . ($a < $b ? "Ya" : "Tidak") . "\n";
?>

<!-- Logika -->
<?php
$a = 8;
$b = 3;

echo "a > 5 dan b < 5? " . ($a > 5 && $b < 5 ? "Ya" : "Tidak") . "\n";
echo "a < 5 atau b < 5? " . ($a < 5 || $b < 5 ? "Ya" : "Tidak") . "\n";
?>

<!-- Increment dan Decrement -->
<?php
$a = 5;
echo "Nilai a: " . $a++ . "\n";       // Tampil 5, lalu a jadi 6
echo "Setelah ++, a = $a\n";          // Tampil 6
?>
