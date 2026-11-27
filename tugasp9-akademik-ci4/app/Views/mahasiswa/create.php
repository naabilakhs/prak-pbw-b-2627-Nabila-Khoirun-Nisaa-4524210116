
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>

<div class="container">

    <nav class="navbar">
        <h2>Sistem Akademik</h2>
        <div class="nav-menu">
            <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
            <a href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a>
        </div>
    </nav>

    <div class="form-card">
        <h1>Tambah Mahasiswa</h1>
        <p>Masukkan informasi mahasiswa baru.</p>

        <?php $errors = session()->getFlashdata('errors') ?? []; ?>

        <?php if (!empty($errors)) : ?>
            <div class="alert alert-error">
                <?php foreach ($errors as $error) : ?>
                    <div><?= esc($error); ?></div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('mahasiswa/simpan'); ?>" method="post">
            <?= csrf_field(); ?>

            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" value="<?= esc(old('nim')); ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Mahasiswa</label>
                <input type="text" name="nama" value="<?= esc(old('nama')); ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= esc(old('email')); ?>" required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" name="prodi" value="<?= esc(old('prodi')); ?>" required>
            </div>

            <div class="form-group">
                <label>Angkatan</label>
                <input type="number" name="angkatan" value="<?= esc(old('angkatan')); ?>" required>
            </div>

            <div class="form-group">
                <label>IPK</label>
                <input type="number" name="ipk" step="0.01" min="0" max="4"
                       value="<?= esc(old('ipk')); ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan Data</button>
            <a href="<?= base_url('mahasiswa'); ?>" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</div>

</body>
</html>
