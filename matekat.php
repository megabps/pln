<?php include "inc/koneksi.php"; 

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
                    <form action="material.php" method="post">
						
							<input type="text"  name="input_cari" placeholder="Search"/>
						
                        <input type="submit" name="cari"  value="Cari">
                     </form>
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
					<div class="features_items"><!--features_items-->
						
						<?php
						$id_kategori=$_GET['id_kategori'];
						$sq=mysqli_query($koneksi,"SELECT * FROM kategori WHERE id_kategori=$id_kategori");
						$re=mysqli_fetch_array($sq);
							$batas = 12;
							$pg = isset( $_GET['pg'] ) ? $_GET['pg'] : ""; 
							if ( empty( $pg ) ) {
							$posisi = 0;
							$pg = 1;
							} else {
							$posisi = ( $pg - 1 ) * $batas;
							}
							
							$inputcari = @$_POST['input_cari'];
							$cari = @$_POST['cari'];
							
							if($cari){
								if($inputcari != ""){
									$sql = mysqli_query($koneksi, "SELECT * FROM material WHERE id_kategori=$id_kategori AND no_sap like '%$inputcari%' OR nama_barang like '%$inputcari%' OR satuan like '%$inputcari%' OR stock like '%$inputcari%' OR lokasi like '%$inputcari%' ORDER BY no_sap DESC");
									
								}else{
    								$sql = mysqli_query($koneksi, "SELECT * FROM material WHERE id_kategori=$id_kategori ORDER BY no_sap DESC LIMIT $posisi, $batas");
								}
							}else{
								$sql = mysqli_query($koneksi, "SELECT * FROM material WHERE id_kategori=$id_kategori ORDER BY no_sap DESC LIMIT $posisi, $batas");
							}
							if(mysqli_num_rows($sql) == 0){
								echo "<div class='alert alert-danger fade in'>Maaf Hasil Pencarian anda tidak ditemukan...!</div>";
							}else{
								//hitung jumlah data
						$jml_data = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM material WHERE id_kategori=$id_kategori"));
						//Jumlah halaman
						$JmlHalaman = ceil($jml_data/$batas); //ceil digunakan untuk pembulatan keatas
 
						//Navigasi ke sebelumnya
						if ( $pg > 1 ) {
						$link = $pg-1;
						$prev = "<li><a href='?pg=$link'>Prev</a></li>";
						} else {
						$prev = "<li><a href=''>Prev</a></li>";
						}
 
						
 
						//Navigasi ke selanjutnya
						if ( $pg < $JmlHalaman ) {
						$link = $pg + 1;
						$next = "<li><a href='?pg=$link'>Next</a></li>";
						} else {
						$next = "<li><a href=''>Next</a></li>";
						}
								
                   		?>
                        <h2 class="title text-center">Material Kategori "<?php echo $re['nama_kategori'];?>"</h2>
                        <?php 
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
                    <ul class="pagination">
                    <?php
					if(mysqli_num_rows($sql) != 0){	
						
						echo $prev . $next;
						
					}
						?>
					</ul>
                    
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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>