<?php include "inc/koneksi.php"; ?>
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
								<li><a href="index.php" class="active">Home</a></li>
								<li><a href="material.php">Material</a></li>
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
                    <form action="material.php" method="post">
						
							<input type="text"  name="input_cari" placeholder="Search"/>
						
                        <input type="submit" name="cari"  value="Cari">
                     </form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
									<img src="images/home/pricing.png"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<img src="images/home/girl3.jpg" alt="slide3" width="1366" height="768">
								
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	
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
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Material</h2>
						<?php
    						$sql = mysqli_query($koneksi, "SELECT * FROM material ORDER BY no_sap DESC LIMIT 9");
							if(mysqli_num_rows($sql) == 0){
								echo "Tidak ada produk!";
							}else{
								while($data = mysqli_fetch_assoc($sql)){
                   		?>
                        <div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="Administrator/foto/<?php echo $data['gambar'];?>" alt="<?php echo $data['nama_barang'];?>" width="268" height="249" />
											<h2><?php echo $data['nama_barang'];?></h2>
											<p>Lokasi : <?php echo $data['lokasi'];?></p>
											<a href="detailmaterial.php?no_sap=<?php echo $data['no_sap'];?>" class="btn btn-default add-to-cart"><i class="fa fa-chevron-circle-right"></i>Detail</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
											<h2><?php echo $data['nama_barang'];?></h2>
											<p>Lokasi : <?php echo $data['lokasi'];?></p>
											<a href="detailmaterial.php?no_sap=<?php echo $data['no_sap'];?>" class="btn btn-default add-to-cart"><i class="fa fa-chevron-circle-right"></i>Detail</a>
											</div>
										</div>
								</div>
							</div>
						</div>
						<?php } 
							} 
						?>		
					</div><!--features_items-->
				</div>
					
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
	

  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
