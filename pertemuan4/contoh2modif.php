<?php

require_once 'koneksi.php';

// Memilih database
mysqli_select_db($koneksi, 'akademik');

// ==========================================
// 1. UPDATE: Mengubah data IPK dan No HP
// ==========================================
echo "=== 1. PROSES UPDATE DATA ===\n";

$sqlUpdate = "UPDATE mahasiswa 
              SET ipk = 3.40, no_hp = '081234567899' 
              WHERE nim = '2025003'";

if (mysqli_query($koneksi, $sqlUpdate)) {
    echo "Data mahasiswa dengan NIM 2025003 berhasil diubah.\n";
    echo "IPK menjadi 3.40 dan No. HP menjadi 081234567899.\n\n";
} else {
    echo "Gagal UPDATE: " . mysqli_error($koneksi) . "\n\n";
}


// ==========================================
// 2. SELECT & GROUP BY
// Rekap jumlah mahasiswa dan rata-rata IPK
// per prodi
// ==========================================
echo "=== 2. REKAP DATA MAHASISWA ===\n";

$sqlRekap = "SELECT prodi,
                    COUNT(*) AS jumlah_mahasiswa,
                    AVG(ipk) AS rata_rata_ipk
             FROM mahasiswa
             GROUP BY prodi
             ORDER BY rata_rata_ipk DESC";

$resultRekap = mysqli_query($koneksi, $sqlRekap);

if (mysqli_num_rows($resultRekap) > 0) {
    while ($row = mysqli_fetch_assoc($resultRekap)) {
        echo "Prodi: " . $row['prodi'] . "\n";
        echo "Jumlah Mahasiswa: " . $row['jumlah_mahasiswa'] . "\n";
        echo "Rata-rata IPK: " . number_format($row['rata_rata_ipk'], 2) . "\n";
        echo "-------------------------\n";
    }
} else {
    echo "Tidak ada data rekap prodi.\n";
}


// ==========================================
// 3. SELECT: Verifikasi data sebelum DELETE
// ==========================================
echo "\n=== 3. VERIFIKASI DATA ===\n";

$sqlVerifikasi = "SELECT nim, nama, no_hp, prodi, ipk 
                  FROM mahasiswa 
                  WHERE nim = '2025003'";

$resultVerifikasi = mysqli_query($koneksi, $sqlVerifikasi);

if (mysqli_num_rows($resultVerifikasi) > 0) {
    $row = mysqli_fetch_assoc($resultVerifikasi);

    echo "Data ditemukan:\n";
    echo "NIM  : " . $row['nim'] . "\n";
    echo "Nama : " . $row['nama'] . "\n";
    echo "No HP: " . $row['no_hp'] . "\n";
    echo "Prodi: " . $row['prodi'] . "\n";
    echo "IPK  : " . $row['ipk'] . "\n";
} else {
    echo "Data mahasiswa tidak ditemukan.\n";
}


// ==========================================
// 4. DELETE: Menghapus data
// ==========================================
echo "\n=== 4. PROSES DELETE DATA ===\n";

$sqlDelete = "DELETE FROM mahasiswa WHERE nim = '2025003'";

if (mysqli_query($koneksi, $sqlDelete)) {
    echo "Data mahasiswa dengan NIM 2025003 berhasil dihapus dari tabel.\n";
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi) . "\n";
}

mysqli_close($koneksi);

?>