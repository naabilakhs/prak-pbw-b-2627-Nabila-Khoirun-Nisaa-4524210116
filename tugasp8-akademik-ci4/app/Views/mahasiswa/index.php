
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
</head>
<body>

    <h2>Data Mahasiswa</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= session()->getFlashdata('success'); ?>
        </p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;">
            <?= session()->getFlashdata('error'); ?>
        </p>
    <?php endif; ?>

    <a href="/mahasiswa/tambah">Tambah Mahasiswa</a>

    <br><br>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>IPK</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($mahasiswa)): ?>
                <?php $no = 1; ?>

                <?php foreach ($mahasiswa as $mhs): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= esc($mhs['nim']); ?></td>
                        <td><?= esc($mhs['nama']); ?></td>
                        <td><?= esc($mhs['email']); ?></td>
                        <td><?= esc($mhs['prodi']); ?></td>
                        <td><?= esc($mhs['ipk']); ?></td>

                        <td>
                            <a href="/mahasiswa/edit/<?= $mhs['id']; ?>">
                                Edit
                            </a>

                            <form action="/mahasiswa/hapus/<?= $mhs['id']; ?>"
                                  method="post"
                                  style="display:inline;">

                                <?= csrf_field(); ?>

                                <button type="submit"
                                    onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>

            <?php else: ?>
                <tr>
                    <td colspan="7">Belum ada data mahasiswa.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
