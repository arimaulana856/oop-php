<?php

// Class Produk
abstract class Produk
{
    private $nama_unit,
        $warna_unit,
        $owner,
        $harga_unit,
        $kategori_unit,
        $diskon = 0;


    public function __construct($nama_unit = "mobil", $warna_unit = "Standart", $owner = "owner", $harga_unit = 0, $kategori_unit = "kendaraan")
    {
        $this->nama_unit = $nama_unit;
        $this->warna_unit = $warna_unit;
        $this->owner = $owner;
        $this->harga_unit = $harga_unit;
        $this->kategori_unit = $kategori_unit;
    }

    // nama unit
    public function setNamaUnit($nama_unit)
    {
        if (!is_string($nama_unit)) {
            throw new Exception("Nama Harus String!");
        }
        return $this->nama_unit = $nama_unit;
    }

    public function getNamaUnit()
    {
        return $this->nama_unit;
    }
    // /nama unit

    // warana unit
    public function setWarnaUnit($warna_unit)
    {
        return $this->warna_unit = $warna_unit;
    }

    public function getWarnaUnit()
    {
        return $this->warna_unit;
    }
    // /warna unit

    // owner
    public function setOwner($owner)
    {
        return $this->owner = $owner;
    }

    public function getOwner()
    {
        return $this->owner;
    }
    // /owner

    // Kategori
    public function setKategoriUnit($kategori_unit)
    {
        return $this->kategori_unit = $kategori_unit;
    }

    public function getKategoriUnit()
    {
        return $this->kategori_unit;
    }
    // /Kategori

    // harga
    public function setHargaUnit($harga_unit)
    {
        return $this->harga_unit = $harga_unit;
    }

    public function getHargaUnit()
    {
        return $this->harga_unit - ($this->harga_unit * $this->diskon / 100);
    }
    // /harga

    // diskon
    public function setDiskon($diskon)
    {
        return $this->diskon = $diskon;
    }

    public function getDiskon()
    {
        return $this->diskon;
    }
    // /diskon

    abstract public function getInfoUnit();

    public function getInfo()
    {
        $str = "{$this->nama_unit}, Warna : {$this->warna_unit}, Owner : {$this->owner}, Harga : {$this->harga_unit}, Kategori : {$this->kategori_unit}";

        return $str;
    }
}

// Class Mobil
class Mobil extends Produk
{
    public $isi_penumpang;

    public function __construct($nama_unit = "mobil", $warna_unit = "Standart", $owner = "owner", $harga_unit = 0, $kategori_unit = "kendaraan", $isi_penumpang = 0)
    {
        parent::__construct($nama_unit, $warna_unit, $owner, $harga_unit, $kategori_unit);

        $this->isi_penumpang = $isi_penumpang;
    }
    public function getInfoUnit()
    {
        $str = "Mobil : " . $this->getInfo() . ", Kapasitas : {$this->isi_penumpang} Orang";
        return $str;
    }
}

// Class Truk
class Truk extends Produk
{
    public $maksimal_muatan;

    public function __construct($nama_unit = "mobil", $warna_unit = "Standart", $owner = "owner", $harga_unit = 0, $kategori_unit = "kendaraan", $maksimal_muatan = 0)
    {
        parent::__construct($nama_unit, $warna_unit, $owner, $harga_unit, $kategori_unit);

        $this->maksimal_muatan = $maksimal_muatan;
    }

    public function getInfoUnit()
    {

        $str = "Truk : " . $this->getInfo() . ", Maks. Muatan : {$this->maksimal_muatan} Kg";
        return $str;
    }
}

class cetakInfoUnit
{
    public $daftarUnit = [];

    public function tambahUnit(Produk $units)
    {
        $this->daftarUnit[] = $units;
    }

    public function cetak()
    {
        $str = "Daftar Unit : <br>";

        foreach ($this->daftarUnit as $unit) {
            $str .= "- {$unit->getInfoUnit()} <br>";
        }

        return $str;
    }
}


// Print
$owner1 = new Mobil("Honda HRV", "White", "Ari", 550000000, "Mobil", 3);

$owner2 = new Truk("Hino", "Green", "Vio", 815000000, "Truk", 2000);

$cetakUnit = new cetakInfoUnit();

$cetakUnit->tambahUnit($owner1);
$cetakUnit->tambahUnit($owner2);

echo $cetakUnit->cetak();
