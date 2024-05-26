<?php
include("koneksi.php");

// Mendapatkan nilai dari parameter yang dikirimkan
$idBaterai = $_GET['idBaterai'] ?? '';
$merkBaterai = $_GET['merkBaterai'] ?? '';
$type = $_GET['Type'] ?? '';
$pabrikan = $_GET['pabrikan'] ?? '';
$idPengisian = $_GET['idPengisian'] ?? '';

// Membuat query untuk menghapus data
$sql = "DELETE FROM tabel_data_baterai WHERE ";
$conditions = array();

if ($idBaterai != '') {
    $conditions[] = "idBaterai = '$idBaterai'";
}

if ($merkBaterai != '') {
    $conditions[] = "merkBaterai = '$merkBaterai'";
}

if ($type != '') {
    $conditions[] = "Type = '$type'";
}

if ($pabrikan != '') {
    $conditions[] = "pabrikan = '$pabrikan'";
}

if ($idPengisian != '') {
    $conditions[] = "idPengisian = '$idPengisian'";
}

// Menggabungkan semua kondisi dengan operator OR
$sql .= implode(' OR ', $conditions);

// Menjalankan query untuk menghapus data
if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
