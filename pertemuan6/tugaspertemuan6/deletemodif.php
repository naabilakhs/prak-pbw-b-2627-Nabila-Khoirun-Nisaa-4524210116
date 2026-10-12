<?php

include "koneksimodif.php";

if (!isset($_GET['nim']) || empty($_GET['nim'])) {

    echo "NIM tidak ditemukan.";
    exit;

}

$nim = $_GET['nim'];

$query = mysqli_query(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim='$nim'"
);

if ($query) {

    header("Location: indexmodif.php");
    exit;

} else {

    echo "Data gagal dihapus.";

}

?>