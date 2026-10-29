<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Produk</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
        }

        h1 {
            margin-bottom: 20px;
        }

        .tambah {
            display: inline-block;
            background-color: #333;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #eee;
        }

        .edit {
            color: blue;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Data Produk</h1>

    <a href="index.php?action=create" class="tambah">
        + Tambah Produk
    </a>

    <table>

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php
        $no = 1;

        while ($data = mysqli_fetch_assoc($produk)) {
        ?>

            <tr>

                <td><?= $no++; ?></td>

                <td>
                    <?= htmlspecialchars($data['nama_produk']); ?>
                </td>

                <td>
                    Rp <?= number_format($data['harga'], 0, ',', '.'); ?>
                </td>

                <td>
                    <?= $data['stok']; ?>
                </td>

                <td>
                    <a
                        href="index.php?action=edit&id=<?= $data['id']; ?>"
                        class="edit">
                        Edit
                    </a>
                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>

</div>

</body>
</html>