
<?php
    include "koneksi.php";
	$no_sap=$_GET['username'];
	$modal=mysqli_query($koneksi,"SELECT * FROM users WHERE username='$no_sap'");
	while($r=mysqli_fetch_array($modal)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Menggunakan Modal Boostrap (popup)</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_edit_user.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
               <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Username">Username</label>
                  <input type="hidden" name="username"  class="form-control" placeholder="No. SAP" required value="<?php echo $r['username'];?>"/>
                  <input type="text" name="username"  class="form-control" placeholder="Username" required value="<?php echo $r['username'];?>" disabled="disabled"/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Nama">Nama</label>
                  <input type="text" name="nama" value="<?php echo $r['nama'];?>"  class="form-control" placeholder="Nama User" required />
                </div>
				
			
				
				<div class="form-group" style="padding-bottom: 20px;">
                  <label for="Level">Level</label>
                  <select name="level"  class="form-control" required>
				  <option value="<?php echo $r['level'];?>"><?php echo $r['level'];?></option>
				  <option value="admin">Admin</option>
				  <option value="user">User</option>
				  </select>
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