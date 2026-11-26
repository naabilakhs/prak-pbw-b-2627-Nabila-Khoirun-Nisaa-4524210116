<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>
<body>

    <h2>Edit Mahasiswa</h2>

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

    <form action="/mahasiswa/update/<?= $mahasiswa['id']; ?>"
          method="post">

        <?= csrf_field(); ?>

        <label>NIM</label><br>
        <input type="text" name="nim"
            value="<?= old('nim', $mahasiswa['nim']); ?>">
        <br><br>

        <label>Nama</label><br>
        <input type="text" name="nama"
            value="<?= old('nama', $mahasiswa['nama']); ?>">
        <br><br>

        <label>Email</label><br>
        <input type="text" name="email"
            value="<?= old('email', $mahasiswa['email']); ?>">
        <br><br>

        <label>Program Studi</label><br>
        <input type="text" name="prodi"
            value="<?= old('prodi', $mahasiswa['prodi']); ?>">
        <br><br>

        <label>IPK</label><br>
        <input type="number" name="ipk"
            step="0.01" min="0" max="4"
            value="<?= old('ipk', $mahasiswa['ipk']); ?>">
        <br><br>

        <button type="submit">Update</button>
        <a href="/mahasiswa">Kembali</a>

    </form>

</body>
</html>
