<!--
Author : Aguzrybudy
Created : Selasa, 19-April-2016
Title : Crud Menggunakan Modal Bootsrap
-->
<?php
    include "koneksi.php";
	$no_sap=$_GET['id_kategori'];
	$modal=mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori='$no_sap'");
	while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_kategori.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
               <div class="form-group" style="padding-bottom: 20px;">
                  <label for="ID Kategori">ID Kategori</label>
                  <input type="hidden" name="id_kategori"  class="form-control" placeholder="No. SAP" required value="<?php echo $r['id_kategori'];?>"/>
                  <input type="text" name="id_kategori1"  class="form-control" placeholder="ID Kategori" required value="<?php echo $r['id_kategori'];?>" disabled="disabled"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama Kategori">Nama Kategori</label>
                  <input type="text" name="nama_kategori" value="<?php echo $r['nama_kategori'];?>"  class="form-control" placeholder="Nama Kategori" required />
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

             <?php } ?>

            </div>

           
        </div>
    </div>