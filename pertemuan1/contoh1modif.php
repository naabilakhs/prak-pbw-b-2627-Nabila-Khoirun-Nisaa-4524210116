<?php
// kalkulator.php

$hasil = null;
$pesan = '';
$nama = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Modifikasi 1: Menambahkan nama pengguna
    $nama = trim($_POST['nama'] ?? '');

    $a = (float) ($_POST['a'] ?? 0);
    $b = (float) ($_POST['b'] ?? 0);
    $operator = $_POST['operator'] ?? '';

    switch ($operator) {

        case '+':
            $hasil = $a + $b;
            break;

        case '-':
            $hasil = $a - $b;
            break;

        case '*':
            $hasil = $a * $b;
            break;

        case '/':
            if ($b == 0) {
                $pesan = 'Pembagian dengan nol tidak diperbolehkan.';
            } else {
                $hasil = $a / $b;
            }
            break;

        // Modifikasi 2: Menambahkan operator modulus
        case '%':
            if ($b == 0) {
                $pesan = 'Modulus dengan nol tidak diperbolehkan.';
            } else {
                $hasil = fmod($a, $b);
            }
            break;

        default:
            $pesan = 'Operator tidak valid.';
    }
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Kalkulator</title>
</head>

<body>

    <h1>Kalkulator Sederhana</h1>

    <form method="post">

        <!-- Modifikasi 1 -->
        <label>Nama:</label>
        <input
            type="text"
            name="nama"
            value="<?= htmlspecialchars($nama) ?>"
            required
        >

        <br><br>

        <input type="number" step="any" name="a" required>

        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>

        <input type="number" step="any" name="b" required>

        <button type="submit">Hitung</button>

    </form>

    <?php if ($pesan): ?>

        <p>
            <?= htmlspecialchars($pesan) ?>
        </p>

    <?php elseif ($hasil !== null): ?>

        <p>
            Halo, <?= htmlspecialchars($nama) ?>.
        </p>

        <p>
            Hasil: <?= htmlspecialchars((string)$hasil) ?>
        </p>

    <?php endif; ?>

</body>

</html>