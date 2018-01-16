<?php
// Skrip berikut ini adalah skrip yang bertugas untuk meng-export data tadi ke excell
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data_material.xls");
?>

<h3>Data Material</h3>
		
<table border="1" cellpadding="5">
	<tr>
		<th>No</th>
		<th>No. SAP</th>
        <th>Nama Material</th>
		<th>Kategori</th>
		<th>Satuan</th>
		<th>Stok</th>
        <th>Lokasi</th>
	
	</tr>
	<?php
	// Load file koneksi.php
	include "conn.php";
	
	
	// Buat query untuk menampilkan semua data siswa
	$sql = $pdo->prepare("SELECT * FROM material");
	$sql->execute(); // Eksekusi querynya
	
	$no = 1; // Untuk penomoran tabel, di awal set dengan 1
	while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
		echo "<tr>";
		echo "<td>".$no."</td>";
		echo "<td>".$data['no_sap']."</td>";
		echo "<td>".$data['nama_barang']."</td>";
		include "koneksi.php";
		$qq = mysqli_query($koneksi,"SELECT * FROM kategori where id_kategori=$data[id_kategori]");
		$q = mysqli_fetch_array($qq);
		echo "<td>".$q['nama_kategori']."</td>";
		echo "<td>".$data['satuan']."</td>";
		echo "<td>".$data['stock']."</td>";
		echo "<td>".$data['lokasi']."</td>";
		//echo "<td>".$data['alamat']."</td>";
		echo "</tr>";
		
		$no++; // Tambah 1 setiap kali looping
	}
	?>
</table>
