<?php

class Mobil
{
    public $nama_mobil, $pemilik, $harga;

    public function __construct($nama_mobil = "Judul", $pemilik = "Durasi", $harga = 0)
    {
        $this->nama_mobil = $nama_mobil;
        $this->pemilik = $pemilik;
        $this->harga = $harga;
    }

    public function getLabel()
    {
        return "$this->nama_mobil, $this->pemilik, $this->harga";
    }
}

$Produk1 = new Mobil("BMW 2000R", "Ambatukam", 2500000000);
$Produk2 = new Mobil("Avanza 2023 New", "Hj. Soleh", 354000000);
echo $Produk1->getLabel();
echo "<br>";
echo $Produk2->getLabel();
