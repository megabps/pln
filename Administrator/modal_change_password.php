
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
            <h4 class="modal-title" id="myModalLabel">Change Password (User : <?php echo $r['username'];?>)</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_change_password.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
               <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Password Lama</label>
                  <input type="hidden" name="username"  class="form-control" holder="No. SAP" required value="<?php echo $r['username'];?>"/>
                  <input type="password" name="password"  class="form-control" placeholder="Password" required value="<?php echo $r['password'];?>" disabled/>
                </div>

                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Password Baru</label>
                  
                  <input type="password" name="password_b"  class="form-control" placeholder="Password Baru" required  /> 
				  <input type="checkbox" id="showPass" > Show password<br>
                </div>
				
				<div class="form-group" style="padding-bottom: 20px;">
                  <label for="Password">Konfirmasi Password Baru</label>
                  <input type="password" name="password_c"  class="form-control" placeholder="Konfirmasi Password Baru" required  />
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
	
	<script type="text/javascript">
	$(function(){
$("#showPass").click(function(){ // #showPass -> id Checkbox
if($("[name=password_b]").attr('type')=='password'){
$("[name=password_b]").attr('type','text');
}else{
$("[name=password_b]").attr('type','password');
}
});
}); 
	</script>
	