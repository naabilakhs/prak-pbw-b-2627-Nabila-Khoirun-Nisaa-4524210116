<?php
include "koneksimodif.php";

$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa ORDER BY nama ASC"
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <title>Data Mahasiswa</title>
</head>

<body class="bg-gray-50 p-6 font-sans text-gray-800">

<div class="max-w-6xl mx-auto bg-white p-6 rounded-lg shadow-md">

    <div class="flex justify-between items-center mb-5">

        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                Data Mahasiswa
            </h2>

            <p class="text-sm text-gray-500">
                Daftar data mahasiswa Universitas Pancasila
            </p>
        </div>

        <a href="createmodif.php"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-4 py-2 rounded">
            + Tambah Mahasiswa
        </a>

    </div>

    <div class="overflow-x-auto">

        <table class="w-full border-collapse border border-gray-200 text-left">

            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-200 p-3">NIM</th>
                    <th class="border border-gray-200 p-3">Nama</th>
                    <th class="border border-gray-200 p-3">Email</th>
                    <th class="border border-gray-200 p-3">No. HP</th>
                    <th class="border border-gray-200 p-3">Prodi</th>
                    <th class="border border-gray-200 p-3">Angkatan</th>
                    <th class="border border-gray-200 p-3">IPK</th>
                    <th class="border border-gray-200 p-3">Aksi</th>
                </tr>
            </thead>

            <tbody>

            <?php while ($data = mysqli_fetch_assoc($query)) { ?>

                <tr class="hover:bg-gray-50">

                    <td class="border border-gray-200 p-3">
                        <?= htmlspecialchars($data['nim']); ?>
                    </td>

                    <td class="border border-gray-200 p-3">
                        <?= htmlspecialchars($data['nama']); ?>
                    </td>

                    <td class="border border-gray-200 p-3">
                        <?= htmlspecialchars($data['email']); ?>
                    </td>

                    <td class="border border-gray-200 p-3">
                        <?= htmlspecialchars($data['no_hp']); ?>
                    </td>

                    <td class="border border-gray-200 p-3">
                        <?= htmlspecialchars($data['prodi']); ?>
                    </td>

                    <td class="border border-gray-200 p-3">
                        <?= htmlspecialchars($data['angkatan']); ?>
                    </td>

                    <td class="border border-gray-200 p-3">
                        <?= htmlspecialchars($data['ipk']); ?>
                    </td>

                    <td class="border border-gray-200 p-3">

                        <a href="editmodif.php?nim=<?= urlencode($data['nim']); ?>"
                           class="text-blue-600 hover:underline">
                            Edit
                        </a>

                        |

                        <a href="deletemodif.php?nim=<?= urlencode($data['nim']); ?>"
                           class="text-red-600 hover:underline">
                            Hapus
                        </a>

                    </td>

                </tr>

            <?php } ?>

            </tbody>

        </table>

    </div>

</div>

</body>
</html>