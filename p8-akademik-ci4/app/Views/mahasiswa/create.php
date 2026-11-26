<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
</head>
<body>

    <h2>Tambah Mahasiswa</h2>

    <?php $errors = session()->getFlashdata('errors') ?? []; ?>

    <?php if (!empty($errors)): ?>
        <div style="color: red;">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= esc($error); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/mahasiswa/simpan" method="post">

        <?= csrf_field(); ?>

        <label>NIM</label><br>
        <input type="text" name="nim"
            value="<?= old('nim'); ?>">
        <br><br>

        <label>Nama</label><br>
        <input type="text" name="nama"
            value="<?= old('nama'); ?>">
        <br><br>

        <label>Email</label><br>
        <input type="text" name="email"
            value="<?= old('email'); ?>">
        <br><br>

        <label>Program Studi</label><br>
        <input type="text" name="prodi"
            value="<?= old('prodi'); ?>">
        <br><br>

        <label>IPK</label><br>
        <input type="number" name="ipk"
            step="0.01" min="0" max="4"
            value="<?= old('ipk'); ?>">
        <br><br>

        <button type="submit">Simpan</button>
        <a href="/mahasiswa">Kembali</a>

    </form>

</body>
</html>
