<?php
$nilai = 50;
if ($nilai >= 75){
echo "lulus\n";
}else {
    echo "tdk lulus" . PHP_EOL;
}


$nilai = "B";

switch($nilai){
    case "A":
        echo "anda lulus" . PHP_EOL;
        break;
    case "B":
        echo "tdk lulus" . PHP_EOL;
        break;
    default:
        echo "coba lagi" . PHP_EOL;
}

$gender = "PRIA";
$hi = $gender == "PRIA" ? "Hi Broo" : "Hi nonaa";

echo $hi . PHP_EOL;