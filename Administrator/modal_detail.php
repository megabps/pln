<?php
    include "koneksi.php";
	$no_sap=$_GET['no_sap'];
	$modal=mysqli_query($koneksi,"SELECT * FROM material WHERE no_sap='$no_sap'");
	$r=mysqli_fetch_array($modal);
	$s = $r['id_kategori'];
	$modal1=mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori=$s");
	$r1=mysqli_fetch_array($modal1);
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabelDetail">Detail Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	
                	<p align="center">
     				<img src="foto/<?php echo $r['gambar'];?>" width="250" height="250" class="img-rounded" />
                    </p>
					
					<form action="proses_ubah_foto.php" enctype="multipart/form-data" method="POST" style="display:none;" id="asd">
					<div class="form-group" style="padding-bottom: 20px;">
						<label for="Foto Barang">Change Foto</label>
						<input type="hidden" name="no_sap"  class="form-control" placeholder="No. SAP" required value="<?php echo $r['no_sap'];?>" />
					<input type="file" name="foto" value="<?php echo $r['gambar'];?>"   class="form-control" placeholder="Foto" />
					</div> 
					<div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Upload
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>
					</form>
					<div align="center">
					<button id="change_btn" onclick="asd(2)" class="btn btn-primary">Change Foto</button>
     				
					</div>
                    
                </div>
                
               <div class="form-group" style="padding-bottom: 20px;">
                  <label for="No SAP">No. SAP</label>
                  <input type="text" name="no_sap"  class="form-control" placeholder="No. SAP" required value="<?php echo $r['no_sap'];?>" disabled="disabled"/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Kategori">Kategori</label>
                  <input type="text" name="kategori" value="<?php echo $r1['nama_kategori'];?>"  class="form-control" placeholder="Nama Kategori" required disabled="disabled"/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama Material">Nama Material</label>
                  <input type="text" name="nama_barang" value="<?php echo $r['nama_barang'];?>"  class="form-control" placeholder="Nama Material" required disabled="disabled"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Satuan">Satuan</label>
                  <input type="text" name="satuan" value="<?php echo $r['satuan'];?>"  class="form-control" placeholder="Satuan" required disabled="disabled"/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Stok">Stok</label>
                   <input type="text" name="stok" value="<?php echo $r['stock'];?>"  class="form-control" placeholder="Stok" required disabled="disabled"/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Lokasi">Lokasi</label>
                   <input type="text" name="lokasi" value="<?php echo $r['lokasi'];?>" class="form-control" placeholder="Lokasi" required disabled="disabled"/>
                </div>

	           

            


            </div>

           
        </div>
    </div>

<script>
function asd(a)
{	
	
    if(a==1)
    document.getElementById("asd").style.display="none";
	
    else
    document.getElementById("asd").style.display="block";

	document.getElementById("change_btn").style.display="none";
}
</script>
	
