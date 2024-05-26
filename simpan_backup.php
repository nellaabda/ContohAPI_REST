<?php
include("koneksi.php");

// Data dari permintaan POST
$merkBaterai = isset($_POST['merkBaterai']) ? $_POST['merkBaterai'] : '';
$PORT = isset($_POST['PORT']) ? $_POST['PORT'] : '';
$type = isset($_POST['Type']) ? $_POST['Type'] : '';
$pabrikan = isset($_POST['Pabrikan']) ? $_POST['Pabrikan'] : '';
$tanggalPembelian = isset($_POST['TanggalPembelian']) ? $_POST['TanggalPembelian'] : '';

//Data dari permintaan GET
$VTegangan1 = isset($_GET['Tegangan1']) ? $_GET['Tegangan1'] : null;
$VTegangan2 = isset($_GET['Tegangan2']) ? $_GET['Tegangan2'] : null;
$VTegangan3 = isset($_GET['Tegangan3']) ? $_GET['Tegangan3'] : null;
$VArus1 = isset($_GET['Arus1']) ? $_GET['Arus1'] : null;
$VArus2 = isset($_GET['Arus2']) ? $_GET['Arus2'] : null;
$VArus3 = isset($_GET['Arus3']) ? $_GET['Arus3'] : null;

// idBaterai
$idAcak = rand(10000000, 99999999);
$idBaterai = str_replace('-', '', $tanggalPembelian) . $idAcak;

// idPengisian
$tanggalPengisian = date('Ymd');
$idPengisian = $tanggalPengisian . '-'. $idBaterai;

// menyimpan data ke tabel
$sql = "INSERT INTO tabel_data_baterai (idBaterai, PORT, merkBaterai, Type, Pabrikan, TanggalPembelian, idPengisian, Tegangan1, Tegangan2, Tegangan3, Arus1, Arus2, Arus3)
        VALUES ('$idBaterai', '$PORT', '$merkBaterai', '$type', '$pabrikan', '$tanggalPembelian', '$idPengisian', '$VTegangan1', '$VTegangan2', '$VTegangan3', '$VArus1', '$VArus2', '$VArus3')";
$result = mysqli_query($koneksi, $sql);

// Memeriksa data apakah berhasil tersimpan
if ($result) {
    // Commit transaksi
    mysqli_commit($koneksi);
    echo "Data berhasil disimpan";
} else {
    // Menampilkan pesan kesalahan
    echo "Proses penyimpanan gagal: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
