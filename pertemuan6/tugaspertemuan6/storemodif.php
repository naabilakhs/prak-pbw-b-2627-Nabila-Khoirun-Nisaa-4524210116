<?php
include "koneksimodif.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
        "INSERT INTO mahasiswa
        (nim, nama, email, no_hp, prodi, angkatan, ipk)
        VALUES
        ('$nim', '$nama', '$email', '$no_hp', '$prodi', '$angkatan', '$ipk')"
    );

    if ($query) {
        header("Location: indexmodif.php");
        exit;
    } else {
        echo "Data gagal disimpan.";
    }
}
?>