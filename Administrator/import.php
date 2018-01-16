<?php
// Load file koneksi.php
include "conn.php";
include "koneksi.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = 'data.xlsx';
  
  // Load librari PHPExcel nya
  require_once 'PHPExcel/PHPExcel.php';
  
  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  
  // Buat query Insert
  $sql = $pdo->prepare("INSERT INTO material(no_sap,nama_barang,satuan,stock,lokasi,id_kategori) VALUES(:no_sap,:nama_barang,:satuan,:stock,:lokasi,:id_kategori)");
  
  $numrow = 1;
  $flag = 0;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $no_sap = $row['A']; // Ambil data NIS
    $nama_barang = $row['B']; // Ambil data nama
	$satuan = $row['C'];
	$stock = $row['D'];
	$lokasi = $row['E'];
	$id_kategori = $row['F'];

    
    // Cek jika semua data tidak diisi
   	if(empty($nama_barang) && empty($no_sap) && empty($satuan) && empty($stock) && empty($lokasi) && empty($id_kategori))
      continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
    
    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database
	  $sql->bindParam(':no_sap', $no_sap);
      $sql->bindParam(':nama_barang', $nama_barang);
      $sql->bindParam(':satuan', $satuan);
	  $sql->bindParam(':stock', $stock);
	  $sql->bindParam(':lokasi', $lokasi);
	  $sql->bindParam(':id_kategori', $id_kategori);
   	
		//cek data ada atau tidak
		$cekdata = "SELECT * FROM material where no_sap='$no_sap'";
		$ada=mysqli_query($koneksi,$cekdata) or die(mysql_error());
		if(mysqli_num_rows($ada)>0)
			{ 
				$flag++;  			
			}else{
				$sql->execute();	
			} 
    }
    
    $numrow++; // Tambah 1 setiap kali looping
  }
  if ($sql == FALSE){
	echo "<p>Insert Gagal karena:".(mysql_error())."</p>";
		}else{
	?><script>alert("Data berhasil diimport!!, Data yang tidak diimport(duplikasi) sebanyak <?php echo $flag;?>");
    			document.location.href = "material.php";
    </script><?php
	}
}

?>