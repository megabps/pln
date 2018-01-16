<?php
include "inc/koneksi.php";
$id= $_GET['no_sap'];
$query= "select * from material where no_sap='$id'";
$sql= mysqli_query($koneksi,$query);
$data= mysqli_fetch_array($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gudang Material | PLN SPKB</title>
<link href="css/bootstrap.css" rel="stylesheet">
 <link rel="stylesheet" href="css/dataTables.bootstrap.css">

<script src="js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
<script>
	$(document).ready(function() {
		$("#create").click(function(){
			$.ajax({
				type: "POST",
				dataType:'json',
				url: "function.php",
				data: $('form').serialize(),
				cache: false,
				success: function(result){
					if(result.status=="ok")
					{
						$('#hasil').html('<img src="http://localhost/pln/qrcode.png">');
					}
					
					
				}
			});
	    	return false;
		});
	});
</script>
</head>

<body>

<div class="container">
<h2>Aplikasi Gudang Material</h2>
<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="Administrator/foto/<?php echo $data['gambar'];?>" width="450" height="400" alt="" />

							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $data['nama_barang'];?></h2>
								<p>No SAP : <?php echo $data['no_sap'];?></p>
                                <p><b>Satuan :</b> <?php echo $data['satuan'];?></p>
								<p><b>Stock :</b> <?php echo $data['stock'];?></p>
								<p><b>Lokasi:</b> <?php echo $data['lokasi'];?></p>
								<form>
<input name="no_sap" type="hidden" value="<?php echo $data['no_sap'];?>"/>
	<input name="satuan" type="hidden" value="<?php echo $data['satuan'];?>"/>
    <input name="namabarang" type="hidden" value="<?php echo $data['nama_barang'];?>"/>
	<br/>
	<button id="create">Tampilkan QR CODE</button>
</form>
<div id="hasil">	
</div>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
</div>
</body>
<script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.dataTables.min.js"></script>
        <script src="js/dataTables.bootstrap.js"></script>	
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>
</html>