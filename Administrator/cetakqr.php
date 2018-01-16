<?php
    include "koneksi.php";
	$modal_id=$_GET['no_sap'];
	$modal=mysqli_query($koneksi,"SELECT * FROM material WHERE no_sap='$modal_id'");
	$r=mysqli_fetch_array($modal)
?>
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
						$('#hasil').html('<img src="http://localhost/pln/Administrator/qrcode.png">');
					}
					
					
				}
			});
	    	return false;
		});
	});
</script>
<form>
<input name="no_sap" type="hidden" value="<?php echo $r['no_sap'];?>"/>
	<input name="satuan" type="hidden" value="<?php echo $r['satuan'];?>"/>
    <input name="namabarang" type="hidden" value="<?php echo $r['nama_barang'];?>"/>
	<input name="foto" type="hidden" value="<?php echo $r['gambar'];?>"/>
	<br/>
	<button id="create">Cetak QR Code</button>
</form>
<div id="hasil">	
</div>