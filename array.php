<?php

$values = array(1, 2, 3, 4);
var_dump($values);

$names = ["eko", "kurniawan", "khannedy"];
var_dump($names);

$names[0] = "joko";
var_dump($names);


var_dump(count($names));

$eko = array(
    "id" => "eko",
    "name" => "eko kurniawan",
    "age" => 30,
    "address" => array(
        "city" => "jakarta",
        "country" => "indonesia" 
    ) 
);
var_dump($eko);

