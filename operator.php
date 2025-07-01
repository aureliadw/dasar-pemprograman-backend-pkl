<!--aritmatika*// -->

<?php
$a = 10;
$b = 3;

echo "Hasil a + b = " . ($a + $b) . "\n";
echo "Hasil a - b = " . ($a - $b) . "\n";
echo "Hasil a * b = " . ($a * $b) . "\n";
echo "Hasil a / b = " . ($a / $b) . "\n";
echo "Sisa bagi a % b = " . ($a % $b) . "\n";
?>


<!--penugasan*//
<?php
$a = 5;
$a += 3;
echo "Nilai a sekarang: $a\n"; // 8

?>


//perbandingan
<?php
$a = 7;
$b = 10;

echo "Apakah a == b? " . ($a == $b ? "Ya" : "Tidak") . "\n";
echo "Apakah a < b? " . ($a < $b ? "Ya" : "Tidak") . "\n";
?>


//logika
<?php
$a = 8;
$b = 3;

echo "a > 5 dan b < 5? " . ($a > 5 && $b < 5 ? "Ya" : "Tidak") . "\n";
echo "a < 5 atau b < 5? " . ($a < 5 || $b < 5 ? "Ya" : "Tidak") . "\n";
?>



//increment,decrement
<?php
$a = 5;
echo "Nilai a: " . $a++ . "\n"; // tampil 5, lalu jadi 6
echo "Setelah ++, a = $a\n";   // tampil 6
?>
