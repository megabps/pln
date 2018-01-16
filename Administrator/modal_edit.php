<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
    include "koneksi.php";
	$no_sap=$_GET['no_sap'];
	$modal=mysqli_query($koneksi,"SELECT * FROM material WHERE no_sap='$no_sap'");
	$r=mysqli_fetch_array($modal);
	$modal1=mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori=$r[id_kategori]");
	$r1=mysqli_fetch_array($modal1);
	$modal2=mysqli_query($koneksi,"SELECT * FROM kategori ORDER BY nama_kategori ASC");
?>

<div class="modal-dialog" id="modal_edit">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
               <div class="form-group" style="padding-bottom: 20px;">
                  <label for="No SAP">No. SAP</label>
                  <input type="hidden" name="no_sap"  class="form-control" placeholder="No. SAP" required value="<?php echo $r['no_sap'];?>"/>
                  <input type="text" name="no_sap1"  class="form-control" placeholder="No. SAP" required value="<?php echo $r['no_sap'];?>" disabled="disabled"/>
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                   <label for="Kategori">Kategori</label>
           				 <select class="form-control" name="kategori">
                			<option value="<?php echo $r1['id_kategori'];?>"><?php echo $r1['nama_kategori'];?></option>
                			<?php
								while($r2=mysqli_fetch_array($modal2)){ 
							?>
                            <option value="<?php echo $r2['id_kategori'];?>"><?php echo $r2['nama_kategori'];?></option>
                            <?php } ?>
           					 </select>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama Material">Nama Material</label>
                  <input type="text" name="nama_barang" value="<?php echo $r['nama_barang'];?>"  class="form-control" placeholder="Nama Material" required />
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Satuan">Satuan</label>
                  <input type="text" name="satuan" value="<?php echo $r['satuan'];?>"  class="form-control" placeholder="Satuan" required />
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Stok">Stok</label>
                   <input type="text" name="stok" value="<?php echo $r['stock'];?>"  class="form-control" placeholder="Stok" required />
                </div>
                
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Lokasi">Lokasi</label>
                   <input type="text" name="lokasi" value="<?php echo $r['lokasi'];?>" class="form-control" placeholder="Lokasi" required />
                </div>
                

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>



            </div>

           
        </div>
    </div>