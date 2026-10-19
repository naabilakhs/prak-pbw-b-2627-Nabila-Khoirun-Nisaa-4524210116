<?php

require_once __DIR__ . "/../models/ProdukModel.php";

class ProdukController
{
    private $model;

    public function __construct($koneksi)
    {
        $this->model = new ProdukModel($koneksi);
    }

    public function index()
    {
        $produk = $this->model->getAll();

        require __DIR__ . "/../views/produk/index.php";
    }

    public function create()
    {
        require __DIR__ . "/../views/produk/create.php";
    }

    public function store()
    {
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $this->model->create(
            $nama_produk,
            $harga,
            $stok
        );

        header("Location: index.php");
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'];

        $produk = $this->model->getById($id);

        require __DIR__ . "/../views/produk/edit.php";
    }

    public function update()
    {
        $id = $_POST['id'];
        $nama_produk = $_POST['nama_produk'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        $this->model->update(
            $id,
            $nama_produk,
            $harga,
            $stok
        );

        header("Location: index.php");
        exit;
    }
}

?>