<?php
//dapat membuat obejct dari sebuah class

class Mahasiswa {
    public $nama;
    public $nim;
    public $jurusan;
}

$mahasiswa = new Mahasiswa();
$mahasiswa->nama="Aurel";
$mahasiswa->nim=98998;
$mahasiswa->jurusan="rpl";

echo "Nama:$nama, NIM:$nim, Jurusan:$jurusan";

    
