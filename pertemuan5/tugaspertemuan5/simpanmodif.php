<?php

include "../koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];

// Validasi IPK
if ($ipk < 0 || $ipk > 4) {
    echo "<script>
            alert('IPK harus berada di antara 0 sampai 4');
            window.history.back();
          </script>";
    exit;
}

// Menyimpan data ke database
$query = mysqli_query(
    $koneksi,
    "INSERT INTO mahasiswa
    (nim, nama, email, no_hp, prodi, angkatan, ipk)
    VALUES
    ('$nim', '$nama', '$email', '$no_hp', '$prodi', '$angkatan', '$ipk')"
);

if ($query) {
    echo "<script>
            alert('Data mahasiswa berhasil disimpan');
            window.location.href = 'formmodif.php';
          </script>";
} else {
    echo "<script>
            alert('Data gagal disimpan');
            window.history.back();
          </script>";
}

?>