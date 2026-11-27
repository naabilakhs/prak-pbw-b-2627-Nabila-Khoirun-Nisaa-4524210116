
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">
</head>
<body>

<div class="container">

    
<nav class="navbar">
    <h2>Sistem Akademik</h2>

    <div class="nav-menu">
        <a href="<?= base_url('dashboard'); ?>">Dashboard</a>
        <a href="<?= base_url('mahasiswa'); ?>">Mahasiswa</a>
        <a href="<?= base_url('dosen'); ?>">Dosen</a>
        <a href="<?= base_url('matakuliah'); ?>">Mata Kuliah</a>
        <a href="<?= base_url('krs'); ?>">KRS</a>
    </div>
</nav>


    <div class="page-header">
        <div>
            <h1>Data Mahasiswa</h1>
            <p>Kelola informasi mahasiswa dalam sistem akademik.</p>
        </div>

        <a href="<?= base_url('mahasiswa/tambah'); ?>" class="btn btn-primary">
            + Tambah Mahasiswa
        </a>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')); ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')) : ?>
        <div class="alert alert-error">
            <?= esc(session()->getFlashdata('error')); ?>
        </div>
    <?php endif; ?>

    <div class="table-card">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>IPK</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($mahasiswa)) : ?>
                    <?php $no = 1; ?>

                    <?php foreach ($mahasiswa as $mhs) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= esc($mhs['nim']); ?></td>
                            <td><?= esc($mhs['nama']); ?></td>
                            <td><?= esc($mhs['email'] ?? '-'); ?></td>
                            <td><?= esc($mhs['prodi']); ?></td>
                            <td><?= esc($mhs['angkatan']); ?></td>
                            <td><?= esc($mhs['ipk']); ?></td>

                            <td>
                                <div class="action">
                                    <a href="<?= base_url('mahasiswa/edit/' . $mhs['id']); ?>"
                                       class="btn btn-edit">Edit</a>

                                    <form action="<?= base_url('mahasiswa/hapus/' . $mhs['id']); ?>"
                                          method="post"
                                          onsubmit="return confirm('Yakin ingin menghapus data mahasiswa ini?');">

                                        <?= csrf_field(); ?>

                                        <button type="submit" class="btn btn-delete">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else : ?>
                    <tr>
                        <td colspan="8" class="empty">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
