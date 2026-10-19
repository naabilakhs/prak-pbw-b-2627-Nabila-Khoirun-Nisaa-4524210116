<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tambah Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        a {
            margin-left: 10px;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Tambah Produk</h1>

    <form action="index.php?action=store" method="POST">

        <label>Nama Produk</label>
        <input
            type="text"
            name="nama_produk"
            required
        >

        <label>Harga</label>
        <input
            type="number"
            name="harga"
            min="0"
            required
        >

        <label>Stok</label>
        <input
            type="number"
            name="stok"
            min="0"
            required
        >

        <button type="submit">
            Simpan
        </button>

        <a href="index.php">
            Kembali
        </a>

    </form>

</div>

</body>
</html>