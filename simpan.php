<?php
	
	include "koneksi.php";
	
	$PORT = isset($_POST['PORT']) ? $_POST['PORT'] : '';
	$merkBaterai = isset($_POST['merkBaterai']) ? $_POST['merkBaterai'] : '';
	$Type = isset($_POST['Type']) ? $_POST['Type'] : '';
	$Pabrikan = isset($_POST['Pabrikan']) ? $_POST['Pabrikan'] : '';
	$TanggalPembelian = isset($_POST['TanggalPembelian']) ? $_POST['TanggalPembelian'] : '';

	
	if (empty($PORT) || empty($merkBaterai) || empty($Type)|| empty($Pabrikan)|| empty($TanggalPembelian) { 
		echo "Kolom isian tidak boleh kosong"; 
	} 
		$query = mysqli_query($con,"INSERT test kelas (port,merek,type,pabrikan_baterai,tanggal_pembelian_baterai) VALUES('".$PORT."','".$merkBaterai."','".$Type."','".$Pabrikan."','".$TanggalPembelian."')");
		
		if ($query) {
			echo "Data berhasil di simpan";
			
		} else{ 
			echo "Error simpan Data";
			
		}
?>