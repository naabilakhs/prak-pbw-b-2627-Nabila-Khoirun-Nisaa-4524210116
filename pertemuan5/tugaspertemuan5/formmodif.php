<!DOCTYPE html>
<html>
<head>
    <title>Form Data Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 30px;
        }

        .container {
            width: 450px;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 9px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #555;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #333;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Form Data Mahasiswa</h2>

    <form action="../simpan.php" method="post">

        <label>NIM</label>
        <input type="text" name="nim" required>

        <label>Nama</label>
        <input type="text" name="nama" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Prodi</label>
        <input type="text" name="prodi" required>

        <label>Angkatan</label>
        <input type="number" name="angkatan" min="2000" max="2100" required>

        <label>IPK</label>
        <input type="number" name="ipk" min="0" max="4" step="0.01" required>

        <button type="submit">Simpan Data</button>

    </form>

</div>

</body>
</html>