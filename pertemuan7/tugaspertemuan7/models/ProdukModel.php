<?php

class ProdukModel
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    public function getAll()
    {
        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM produk ORDER BY id DESC"
        );

        return $query;
    }

    public function getById($id)
    {
        $id = (int) $id;

        $query = mysqli_query(
            $this->koneksi,
            "SELECT * FROM produk WHERE id = $id"
        );

        return mysqli_fetch_assoc($query);
    }

    public function create($nama_produk, $harga, $stok)
    {
        $nama_produk = mysqli_real_escape_string(
            $this->koneksi,
            $nama_produk
        );

        $harga = (float) $harga;
        $stok = (int) $stok;

        return mysqli_query(
            $this->koneksi,
            "INSERT INTO produk (nama_produk, harga, stok)
             VALUES ('$nama_produk', '$harga', '$stok')"
        );
    }

    public function update($id, $nama_produk, $harga, $stok)
    {
        $id = (int) $id;

        $nama_produk = mysqli_real_escape_string(
            $this->koneksi,
            $nama_produk
        );

        $harga = (float) $harga;
        $stok = (int) $stok;

        return mysqli_query(
            $this->koneksi,
            "UPDATE produk
             SET nama_produk = '$nama_produk',
                 harga = '$harga',
                 stok = '$stok'
             WHERE id = $id"
        );
    }
}
?>