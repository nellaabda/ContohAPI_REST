<?php
include("koneksi.php");

// Membuat SQL Query
$sql = "SELECT idBaterai, merkBaterai, Type, pabrikan, idPengisian, PORT,
        CASE
            WHEN PORT = 1 THEN Tegangan1
            WHEN PORT = 2 THEN Tegangan2
            WHEN PORT = 3 THEN Tegangan3
        END AS Tegangan,
        CASE
            WHEN PORT = 1 THEN Arus1
            WHEN PORT = 2 THEN Arus2
            WHEN PORT = 3 THEN Arus3
        END AS Arus,
        FROM tabel_data_baterai
        WHERE PORT IN (1, 2, 3)";

// Mendapatkan Hasil
$r = mysqli_query($koneksi, $sql);

// Membuat Array Kosong
$result = array();

while ($row = mysqli_fetch_array($r)) {
    // Memasukkan Nama dan ID ke dalam Array Kosong yang telah dibuat
    $item = array(
        "idBaterai" => $row['idBaterai'],
        "merkBaterai" => $row['merkBaterai'],
        "Type" => $row['Type'],
        "Pabrikan" => $row['pabrikan'],
        "idPengisian" => $row['idPengisian'],
        "PORT" => $row['PORT'],
        "Tegangan" => $row['Tegangan'],
        "Arus" => $row['Arus'],
    );
    array_push($result, $item);
}

// Menampilkan Array dalam Format JSON
echo json_encode(array('Data Baterai' => $result));

mysqli_close($koneksi);
?>
