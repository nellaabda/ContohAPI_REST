<html>
    <head>
        <title>Tabel Service Baterai</title>
    </head>
    <body>
        <h1>Tabel Pengisian Daya</h1>
        <table width="100%" border="1" cellspacing="2" cellpadding="3">
            <tr>
                <td>PORT</td>
                <td>Merek Baterai</td>
                <td>Type Baterai</td>
                <td>Pabrikan Baterai</td>
                <td>Tanggal Pembelian</td>
                <td>ID Baterai</td>
                <td>Tanggal Pengisian</td>
                <td>ID Pengisian</td>
                <td>Tegangan port 1</td>
                <td>Arus port 1</td>
                <td>Tegangan port 2</td>
                <td>Arus port 2</td>
                <td>Tegangan port 3</td>
                <td>Arus port 3</td>
            </tr>
            <?php
            echo "Status Jaringan :";
            include("koneksi.php");
            $query = "SELECT * FROM tabel_data_baterai";
            $result = mysqli_query($koneksi, $query);
                while ($baris = mysqli_fetch_array($result)) {
                     echo "<tr>";
                         echo '<td>' . $baris['PORT'] . '</td>';
                         echo '<td>' . $baris['merkBaterai'] . '</td>';
                         echo '<td>' . $baris['Type'] . '</td>';
                         echo '<td>' . $baris['Pabrikan'] . '</td>';
                         echo '<td>' . $baris['TanggalPembelian'] . '</td>';
                         echo '<td>' . $baris['idBaterai'] . '</td>';
                         echo '<td>' . $baris['TanggalPengisian'] . '</td>';
                         echo '<td>' . $baris['idPengisian'] . '</td>';
                         echo '<td>' . $baris['Tegangan1'] . '</td>';
                         echo '<td>' . $baris['Arus1'] . '</td>';
                         echo '<td>' . $baris['Tegangan2'] . '</td>';
                         echo '<td>' . $baris['Arus2'] . '</td>';
                         echo '<td>' . $baris['Tegangan3'] . '</td>';
                         echo '<td>' . $baris['Arus3'] . '</td>';
                     echo "</tr>";
                  }
                 ?>
        </table>             
    </body>
</html>