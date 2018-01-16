<?php
  session_start();
  if(!isset($_SESSION['admin'])) {
  header('location:beranda.php'); }
  else { $id = $_SESSION['admin']; }
  require_once("koneksi.php");
  $query = mysqli_query($koneksi,"SELECT * FROM users WHERE username = '$id'");
  $hasil11 = mysqli_fetch_array($query);
?>
<!doctype html>
<html lang="en">
<head>
<title>Gudang Material | PT. PLN Sektor Pembangkitan Pekanbaru</title>
<meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" name="viewport"/>
<meta content="pln" name="author"/>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet">

 <link rel="stylesheet" href="css/font-awesome.min.css">
<script src="js/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="dist/sweetalert.css">

<!--new-->
<link rel="stylesheet" type="text/css" href="./assets/css/vendor.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/flat-admin.css">

  <!-- Theme -->
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue-sky.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/blue.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/red.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/theme/yellow.css">
<style>

</style>
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
<div class="app app-default">

<aside class="app-sidebar" id="sidebar">
  <div class="sidebar-header">
    <a class="sidebar-brand" href="#"><span class="highlight">PLN SPKB</span> Admin</a>
    <button type="button" class="sidebar-toggle">
      <i class="fa fa-times"></i>
    </button>
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-nav">
      <li>
        <a href="./index.php">
          <div class="icon">
            <i class="fa fa-tasks" aria-hidden="true"></i>
          </div>
          <div class="title">Dashboard</div>
        </a>
      </li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <div class="icon">
            <i class="fa fa-cube" aria-hidden="true"></i>
          </div>
          <div class="title">Master Data</div>
        </a>
        <div class="dropdown-menu">
          <ul>
            <li class="section"><i class="fa fa-file-o" aria-hidden="true"></i> Master Data</li>
            <li><a href="kategori.php">Kategori</a></li>
            <li><a href="material.php">Material</a></li>
          </ul>
        </div>
      </li>
	  <li>
        <a href="./profile.php">
          <div class="icon">
            <i class="fa fa-user" aria-hidden="true"></i>
          </div>
          <div class="title">Profile</div>
        </a>
      </li>
	  <li class="active">
        <a href="./users.php">
          <div class="icon">
            <i class="fa fa-users" aria-hidden="true"></i>
          </div>
          <div class="title">All Users</div>
        </a>
      </li>
	  <li>
        <a href="../" target="_blank">
          <div class="icon">
            <i class="fa fa-globe" aria-hidden="true"></i>
          </div>
          <div class="title">View Site</div>
        </a>
      </li>
    </ul>
  </div>
  
</aside>

<script type="text/ng-template" id="sidebar-dropdown.tpl.html">
  <div class="dropdown-background">
    <div class="bg"></div>
  </div>
  <div class="dropdown-container">
    {{list}}
  </div>
</script>
<div class="app-container">

  <nav class="navbar navbar-default" id="navbar">
  <div class="container-fluid">
    <div class="navbar-collapse collapse in">
      <ul class="nav navbar-nav navbar-mobile">
        <li>
          <button type="button" class="sidebar-toggle">
            <i class="fa fa-bars"></i>
          </button>
        </li>
        <li class="logo">
          <a class="navbar-brand" href="#"><span class="highlight">PLN SPKB</span> Admin</a>
        </li>
        <li>
          <button type="button" class="navbar-toggle">
            <img class="profile-img" src="./assets/images/profile.png">
          </button>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-left">
        <li class="navbar-title">Dashboard</li>
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown profile">
          <a href="/html/pages/profile.html" class="dropdown-toggle"  data-toggle="dropdown">
           <?php if($hasil11['level']=="admin"){?>
			<img class="profile-img" src="./assets/images/admin.png">
			<?php } else { ?>
			<img class="profile-img" src="./assets/images/user.png">
			<?php } ?>
            <div class="title">Profile</div>
          </a>
          <div class="dropdown-menu">
            <div class="profile-info">
              <h4 class="username"><?php echo $hasil11['nama'];?> (<?php echo $hasil11['level'];?>)</h4>
            </div>
            <ul class="action">
              <li>
                <a href="profile.php">
                  Profile
                </a>
              </li>
              <li>
                <a href="logout.php" class="logout">
                  Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
<div class="col-xs-12">

 <a href="#" class="open_add btn btn-success" data-target="modal_add" data-toggle="modal">Add Data <i class="fa fa-plus" aria-hidden="true"></i></a>  
 
  </div>
  </div>

<div class="row">
 <div class="col-xs-12">
      <div class="card">
	
<div class="card-header">
          <h3>Daftar User</h3>
        </div>
		<div class="card-body no-padding">
<?PHP if (!empty($_GET['pesan'])) { if ($_GET['pesan'] == 'sukses') { 
echo '<div class="alert alert-danger fade in">Hapus data User berhasil...!</div>';}}?>
<form name="form" action="deletemultipleuser.php" method="post" onsubmit="return deleteConfirm();"/>
<table class="datatable table table-striped primary" cellspacing="0" width="100%">
    <thead>
    <th width="5%"><input type="checkbox" name="select_all" id="select_all" value=""/></th>
      <th>No</th>
      <th>Username</th>
      <th>Nama</th>
	  <th>Password</th>
	  <th>Level</th>
      <th>Action</th>
     
    </thead>
	<tbody>
<?php 
  //menampilkan data mysqli
  date_default_timezone_set('Asia/Jakarta');
  include "koneksi.php";
  $no = 0;
  $modal=mysqli_query($koneksi, "SELECT * FROM users") or die("Error: " . mysqli_error($koneksi));
  while($r=mysqli_fetch_array($modal)){
  $no++;
       
?>
  <tr>
  	  <td align="center"><input type="checkbox" name="checked_id[]" class="checkbox" value="<?php echo $r['username'];?>"/></td>
      <td><?php echo $no; ?></td>
      <td><?php echo  $r['username']; ?></td>
      <td><?php echo  $r['nama']; ?></a></td>
	  <td><?php echo  $r['password']; ?></a></td>
	   <td><?php echo  $r['level']; ?></a></td>
  
      <td>
         <a href="#" class='open_modal btn btn-primary' id='<?php echo  $r['username']; ?>'>Edit <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		 
         <a href="#" onclick="confirm_modal('proses_delete_user.php?&username=<?php echo  $r['username']; ?>');" class="btn btn-danger">Delete<i class="fa fa-trash" aria-hidden="true"></i></a>
		 <a href="#" class='open_change btn btn-success' id='<?php echo $r['username']; ?>'>Change Password <i class="fa fa-key" aria-hidden="true"></i></a>
   
         
      </td>
  </tr>
 

<?php } ?>
</tbody>
</table>
<input type="submit" class="btn btn-danger" name="delete_submit" value="Hapus"/>
</form>
</div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Popup untuk Add--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelAdd" aria-hidden="true">

</div>

<!-- Modal Popup untuk Change Password--> 
<div id="ModalChange" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabelChange" aria-hidden="true">

</div>


<!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>


<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
      </div>
                
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

		<script type="text/javascript" src="./assets/js/vendor.js"></script>
  <script type="text/javascript" src="./assets/js/app.js"></script>
        <script type="text/javascript">
            $(function() {
                $('#example1').dataTable();
            });
        </script>

<script type="text/javascript">
   $(document).ready(function () {
   $(document).on('click','.open_add', function(e) {
		   $.ajax({
    			   url: "modal_add_user.php",
    			   success: function (ajaxData){
				   $("#ModalAdd").html(ajaxData);
      			   $("#ModalAdd").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<!-- Javascript untuk popup modal Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(document).on('click','.open_modal',function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "modal_edit_user.php",
    			   type: "GET",
    			   data : {username: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<!-- Javascript untuk popup modal Change Password--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(document).on('click','.open_change',function(e) {
      var m = $(this).attr("id");
		   $.ajax({
    			   url: "modal_change_password.php",
    			   type: "GET",
    			   data : {username: m,},
    			   success: function (ajaxData){
      			   $("#ModalChange").html(ajaxData);
      			   $("#ModalChange").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>


<!-- Javascript untuk popup modal Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>

<script type="text/javascript">
function deleteConfirm(){
  
	var result = confirm("Apakah anda yakin ingin menghapus data modal");
   if(result){
        return true;
    }else{
       return false;
    }
}

$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
});
</script>
<script type="text/javascript">

    $('.logout').click(function(){
       swal({
			title: "Logout!",
			text: "I will close in 2 seconds.",
			timer: 2000,
			type: "success",
			showConfirmButton: false
			});
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.dropdown-toggle').dropdown();
    });
</script>
</body>

</html>

  



