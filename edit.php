<?php
include("koneksi.php");

// data yang diedit
$idBaterai = $_POST['idBaterai'] ?? '';
$merkBaterai = $_POST['merkBaterai'] ?? '';
$type = $_POST['Type'] ?? '';
$pabrikan = $_POST['pabrikan'] ?? '';
$idPengisian = $_POST['idPengisian'] ?? '';

// mengupdate data
$sql = "UPDATE tabel_data_baterai SET ";

if ($merkBaterai != '') {
    $sql .= "merkBaterai = '$merkBaterai', ";
}

if ($type != '') {
    $sql .= "Type = '$type', ";
}

if ($pabrikan != '') {
    $sql .= "pabrikan = '$pabrikan', ";
}

if ($idPengisian != '') {
    $sql .= "idPengisian = '$idPengisian', ";
}

// Menghapus koma terakhir dari query
$sql = rtrim($sql, ', ');

// Menambahkan kondisi WHERE berdasarkan idBaterai
$sql .= " WHERE idBaterai = '$idBaterai'";

// mengupdate data
if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil diupdate.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

$koneksi->close();
?>
