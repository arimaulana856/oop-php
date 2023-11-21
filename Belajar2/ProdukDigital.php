<?php



class Produk
{
    public $nama_makanan,
        $nama_penjual,
        $harga,
        $tipe_rasa,
        $level_pedas;

    public function __construct($nama_makanan = "Makanan", $nama_penjual = "Penjual", $harga = 0, $tipe_rasa = "Rasa", $level_pedas = 0)
    {
        $this->nama_makanan = $nama_makanan;
        $this->nama_penjual = $nama_penjual;
        $this->harga = $harga;
        $this->tipe_rasa = $tipe_rasa;
        $this->level_pedas = $level_pedas;
    }

    public function namaPenjual()
    {
        return $this->nama_penjual;
    }
}

class MakananManis extends Produk
{
    public function infoMakanan()
    {
        $str = "{$this->nama_makanan} | {$this->namaPenjual()} - {$this->harga} - {$this->tipe_rasa}";
        return $str;
    }
}

class MakananPedas extends Produk
{
    public function infoMakanan()
    {
        $str = "{$this->nama_makanan} | {$this->namaPenjual()} - {$this->harga} - {$this->tipe_rasa} - Level : {$this->level_pedas}";
        return $str;
    }
}


$pembeli_1 = new MakananManis("Pancake", "Violita", "20000", "Manis");

$pembeli_2 = new MakananPedas("Seblak Ceker", "Dinda", "10000", "Pedas", 40);


echo $pembeli_1->infoMakanan();
echo "<br>";
echo $pembeli_2->infoMakanan();
