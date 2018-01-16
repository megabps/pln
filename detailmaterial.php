<?php include "inc/koneksi.php"; 
date_default_timezone_set("Asia/Jakarta");
$id= $_GET['no_sap'];
$query= "select * from material where no_sap='$id'";
$sql= mysqli_query($koneksi,$query);
$data1= mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gudang Material | PT. PLN Sektor Pembangkitan Pekanbaru</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="Administrator/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="Administrator/images/favicon.ico" type="image/x-icon">
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
</head><!--/head-->

<body>
	<header id="header"><!--header-->
	
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="index.html"><img src="images/home/logo.png" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							
						</div>
					</div>
					<div class="col-sm-8">
						
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li><a href="material.php" class="active">Material</a></li>
								<li class="dropdown"><a href="#">Kategori<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <?php
    									$sql = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
										if(mysqli_num_rows($sql) == 0){
											echo "Tidak ada produk!";
										}else{
											while($data = mysqli_fetch_assoc($sql)){
                   						?>
                                        <li><a href="matekat.php?id_kategori=<?php echo $data['id_kategori'];?>"><?php echo $data['nama_kategori'];?></a></li>
                                        <?php
											}
										}
										?>
                                    </ul>
                                </li> 
							
								<li><a href="contact-us.php">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						
					</div>
				</div>
				</div>
			</div>
	</header>
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Kategori</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php
    						$sql = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY nama_kategori ASC");
							if(mysqli_num_rows($sql) == 0){
								echo "Tidak ada produk!";
							}else{
								while($data = mysqli_fetch_assoc($sql)){
                   			?>
                            <div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="matekat.php?id_kategori=<?php echo $data['id_kategori'];?>"><?php echo $data['nama_kategori'];?></a></h4>
								</div>
							</div>
                            <?php 
								}
							}
							?>
						</div><!--/category-products-->

					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="Administrator/foto/<?php echo $data1['gambar'];?>" alt="" />
								
							</div>
							

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h1><?php echo $data1['nama_barang'];?></h1>
								<p>No. SAP : <?php echo $data1['no_sap'];?></p>
                                <br>
								<p><b>Stock :</b><?php if($data1['stock'] == 0) { ?> Material Kosong <?php } else { ?> Material Ada <?php } ?></p>
								<p><b>Kondisi:</b> Baik</p>
                                
								<span>
                                <form>
                                <input name="no_sap" type="hidden" value="<?php echo $data1['no_sap'];?>"/>
									<button id="create" type="button" class="btn btn-toolbar" >
										<i class="fa fa-code"></i>
										Tampilkan QR Code
									</button>
                                 </form>
                                 
								</span>
                                <div id="hasil">
                                
                                </div>
                                
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#reviews" data-toggle="tab">Informasi Material</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-clock-o"></i><?php echo date('H:i:s');?></a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i><?php echo date('d-M-Y');?></a></li>
									</ul>
									<p>Informasi : </p>
									
									
									
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2017 AETech Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="#">EEZ</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	
	
    
  	<script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>