<?php

include "koneksi.php";

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$no_hp = $_POST['no_hp'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];

// Validasi IPK
if ($ipk < 0 || $ipk > 4) {
    echo "IPK harus berada di antara 0 sampai 4.";
    exit;
}

// Validasi No. HP
if (strlen($no_hp) < 10 || strlen($no_hp) > 15) {
    echo "No. HP harus terdiri dari 10 sampai 15 karakter.";
    exit;
}

$query = mysqli_query(
    $koneksi,
    "UPDATE mahasiswa
    SET
        nama = '$nama',
        email = '$email',
        no_hp = '$no_hp',
        prodi = '$prodi',
        angkatan = '$angkatan',
        ipk = '$ipk'
    WHERE nim = '$nim'"
);

if ($query) {

    header("Location: index.php");
    exit;

} else {

    echo "Data gagal diubah.";

}

?>