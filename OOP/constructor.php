<?php

//dengan constructor
class Buku {
    public $judul;
    public $pengarang;
    public $tahunTerbit;


public function __construct($judul,$pengarang,$tahunTerbit){
    $this->judul=$judul;
    $this->pengarang=$pengarang;
    $this->tahunTerbit=$tahunTerbit;
}};

$buku1 = new Buku("Laskar Pelangi", "Andre", 2005);
echo "$buku1->judul, $buku1->pengarang, $buku1->tahunTerbit" . PHP_EOL;















