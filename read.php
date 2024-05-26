<?php
include("koneksi.php");

// Mendapatkan nilai dari parameter yang dikirimkan
$idBaterai = $_GET['idBaterai'] ?? '';
$merkBaterai = $_GET['merkBaterai'] ?? '';
$type = $_GET['Type'] ?? '';
$pabrikan = $_GET['pabrikan'] ?? '';
$idPengisian = $_GET['idPengisian'] ?? '';

// Membuat query untuk mengambil data
$sql = "SELECT * FROM tabel_data_baterai WHERE 1 = 1";

if ($idBaterai != '') {
    $sql .= " AND idBaterai = '$idBaterai'";
}

if ($merkBaterai != '') {
    $sql .= " AND merkBaterai = '$merkBaterai'";
}

if ($type != '') {
    $sql .= " AND Type = '$type'";
}

if ($pabrikan != '') {
    $sql .= " AND pabrikan = '$pabrikan'";
}

if ($idPengisian != '') {
    $sql .= " AND idPengisian = '$idPengisian'";
}

// Menjalankan query untuk mengambil data
$result = $koneksi->query($sql);

// Mengecek apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    // Menginisialisasi array kosong untuk menyimpan data
    $data = array();

    // Mengambil setiap baris data dan menyimpannya ke dalam array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Mengembalikan data dalam format JSON
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    echo "Data tidak ditemukan.";
}

$koneksi->close();
?>
