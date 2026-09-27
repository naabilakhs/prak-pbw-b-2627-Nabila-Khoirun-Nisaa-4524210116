<?php

interface BisaDihitung
{
    public function hargaAkhir(): float;
}

class Produk implements BisaDihitung
{
    public function __construct(
        protected string $nama,
        protected float $harga
    ) {}

    public function hargaAkhir(): float
    {
        return $this->harga;
    }

    public function getNama(): string
    {
        return $this->nama;
    }
}

class ProdukDiskon extends Produk
{
    public function __construct(
        string $nama,
        float $harga,
        private float $diskon
    ) {
        parent::__construct($nama, $harga);
    }

    public function hargaAkhir(): float
    {
        return $this->harga * (1 - $this->diskon / 100);
    }

    // Modifikasi 1: Menambahkan function untuk mendapatkan diskon
    public function getDiskon(): float
    {
        return $this->diskon;
    }
}

// Modifikasi 2: Menambahkan produk baru
$daftar = [
    new Produk('Keyboard', 250000),
    new ProdukDiskon('Mouse', 150000, 10),
    new Produk('Headset', 200000)
];

foreach ($daftar as $produk) {
    echo $produk->getNama()
        . " Rp "
        . number_format($produk->hargaAkhir(), 0, ',', '.');

    // Menampilkan informasi diskon jika produk memiliki diskon
    if ($produk instanceof ProdukDiskon) {
        echo " (Diskon " . $produk->getDiskon() . "%)";
    }

    echo "<br>";
}

?>