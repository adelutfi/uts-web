<h2>Sistem Informasi Data Mahasiswa</h2>
<hr>
<a href="input.php">Tambah Data</a>
<table border="1">
    <tr>
        <th>NIM</th>
        <th>NAMA </th>
        <th>JURUSAN<th>
    
    <tr>
    <?php
    include "koneksi.php";

    $konkesiObj = new koneksi();
    $koneksi = $konkesiObj->getKoneksi();
        
        
    if($koneksi->connect_error) {
        echo "<tr><td>";
        echo "Gagal Koneksi : " . $koneksi->connect_error;
        echo "</td></tr>";
    } 

    $query = "select * from mahasiswauts";
    $data = $koneksi->query($query);

    if($data->num_rows <=0){
        echo "<tr><td>";
        echo "DATA NIHIL";
        echo "</tr></td>";
    } else { 
       while($row = $data->fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["Nim"] . "</td>";
            echo "<td>" . $row["Nama"] . "</td>"; 
            echo "<td>" . $row["Jurusan"] . "</td>";
            echo '<td><a href=" edit.php?nim=' . $row["Nim"] . '">Edit</a></td>';
            echo '<td><a href="hapus.php?nim=' . $row["Nim"] . '">Hapus</a></td>';
            echo "</tr>";
       }
    }
?>

</table>
