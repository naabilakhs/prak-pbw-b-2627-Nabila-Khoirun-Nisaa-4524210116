<?php

require_once 'koneksi.php';

mysqli_select_db($koneksi, 'akademik');

$sqlInsert = "INSERT IGNORE INTO mahasiswa 
(nim, nama, email, no_hp, prodi, angkatan, ipk) VALUES
('2026001', 'Andi Pratama', 'andi@kampus.ac.id', '081234567801', 'Teknik Informatika', 2026, 3.75),
('2026002', 'Siti Rahma', 'siti@kampus.ac.id', '081234567802', 'Sistem Informasi', 2026, 3.82),
('2026003', 'Budi Santoso', 'budi@kampus.ac.id', '081234567803', 'Teknik Informatika', 2026, 3.20)";

if (mysqli_query($koneksi, $sqlInsert)) {
    echo "[INSERT] Data mahasiswa berhasil dimasukan ke tabel.\n\n";
} else {
    echo "[ERROR] Gagal memasukan data: " . mysqli_error($koneksi) . "\n\n";
}

$sqlSelect = "SELECT nim, nama, no_hp, prodi, ipk,
                     CASE
                         WHEN ipk >= 3.75 THEN 'Sangat Memuaskan'
                         ELSE 'Memuaskan'
                     END AS status_ipk
              FROM mahasiswa
              WHERE ipk >= 3.50
              ORDER BY ipk DESC, nama ASC
              LIMIT 10";

$RESULT = mysqli_query($koneksi, $sqlSelect);

echo "- - - Hasil Query SELECT - - -\n";

if (mysqli_num_rows($RESULT) > 0) {
    while ($row = mysqli_fetch_assoc($RESULT)) {
        echo "NIM: " . $row['nim'] . "\n";
        echo "Nama: " . $row['nama'] . "\n";
        echo "No. HP: " . $row['no_hp'] . "\n";
        echo "Prodi: " . $row['prodi'] . "\n";
        echo "IPK: " . $row['ipk'] . "\n";
        echo "Status IPK: " . $row['status_ipk'] . "\n";
        echo "-------------------------\n";
    }
} else {
    echo "Tidak ada data mahasiswa dengan kriteria tersebut.\n";
}

mysqli_close($koneksi);

?>