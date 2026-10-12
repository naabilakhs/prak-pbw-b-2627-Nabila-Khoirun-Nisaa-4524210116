<?php
include "../koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM mahasiswa");

echo "<h3>Data Mahasiswa</h3>";

while ($data = mysqli_fetch_assoc($query)) {
    echo "NIM: " . $data['nim'];
    echo "<br>";
    echo "Nama: " . $data['nama'];
    echo "<br>";
    echo "Email: " . $data['email'];
    echo "<br>";
    echo "Prodi: " . $data['prodi'];
    echo "<br>";
    echo "Angkatan: " . $data['angkatan'];
    echo "<br>";
    echo "IPK: " . $data['ipk'];
    echo "<hr>";
}
?>