<?php

for ($counter = 1; $counter <= 10; $counter++){
    echo "ini adalah for loop ke-$counter" . PHP_EOL;
}

$counter = 1;

while ($counter <= 10){
    echo "ini adalah for loop ke$counter" . PHP_EOL;
    $counter++;
}

$names = ["eko", "zahra", "salwa"];

foreach($names as $name){
    echo "Data $name" . PHP_EOL;
}

$person =[
    "id" => "eko",
    "name" => "eko kurniawan",
    "country" => "indonesia"
];

foreach($person as $key => $value) {
    echo "$key : $value" . PHP_EOL;
}