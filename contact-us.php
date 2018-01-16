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
								<li><a href="index.php">Home</a></li>
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
							
								<li ><a href="contact-us.php" class="active">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row">    		
	    		<div class="col-sm-12">    			   			
					<h2 class="title text-center">Hubungi <strong>Kami</strong></h2>    			    				    				
					<div id="map" class="contact-map"></div>
				</div>			 		
			</div>    	
    		<div class="row">  	
	    		<div class="col-sm-8">
	    			<div class="contact-form">
	    				<h2 class="title text-center">Kirim Pesan Ke Kami</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    	<form id="main-contact-form" class="contact-form row" name="contact-form" method="post" action="sendemail.php">
				            <div class="form-group col-md-6">
				                <input type="text" name="name" class="form-control" required placeholder="Name">
				            </div>
				            <div class="form-group col-md-6">
				                <input type="email" name="email" class="form-control" required placeholder="Email">
				            </div>
				            <div class="form-group col-md-12">
				                <input type="text" name="subject" class="form-control" required placeholder="Subject">
				            </div>
				            <div class="form-group col-md-12">
				                <textarea name="message" id="message" required class="form-control" rows="8" placeholder="Your Message Here"></textarea>
				            </div>                        
				            <div class="form-group col-md-12">
				                <input type="submit" name="submit" class="btn btn-primary pull-right" value="Submit">
				            </div>
				        </form>
	    			</div>
	    		</div>
	    		<div class="col-sm-4">
	    			<div class="contact-info">
	    				<h2 class="title text-center">Hubungi Kami</h2>
	    				<address>
	    					<p>PT. PLN Sektor Pekanbaru</p>
							<p>JL. Tanjung Datuk No. 74</p>
							<p>Pekanbaru, Riau, Indonesia</p>
							<p><i class="fa fa-phone"></i> : +62761 XXXXXX</p>
							<p><i class="fa fa-envelope"></i> : info@plnkitsbu.com</p>
	    				</address>
	    				<div class="social-networks">
	    					<h2 class="title text-center">Media Social</h2>
							<ul>
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-google-plus"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-bolt"></i></a>
								</li>
							</ul>
	    				</div>
	    			</div>
    			</div>    			
	    	</div>  
    	</div>	
    </div><!--/#contact-page-->
	
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
	 <script>
    
    var marker;
      function initialize() {
      
    // Variabel untuk menyimpan informasi (desc)
    var infoWindow = new google.maps.InfoWindow;
    
    //  Variabel untuk menyimpan peta Roadmap
    var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
     } 
    
    // Pembuatan petanya
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);
              
        // Variabel untuk menyimpan batas kordinat
    var bounds = new google.maps.LatLngBounds();
    var image = "pln.png";
    var image2 = "loc.png";
    // Pengambilan data dari database
    <?php
        $nama = "PT. PLN Sektor Pekanbaru";
		$lokasi = "JL. Tanjung Datuk No. 74";
		$telp = "+62761 XXXXXX";
        $lat = "0.536905";
        $lon = "101.4510241";
        echo ("addMarkerSudah($lat, $lon, '<h3><b>$nama</b></h3><br/>Alamat : $lokasi<br/>No. Telepon : $telp');\n");                      
	
    ?>
      
    // Proses membuat marker status sudah
    function addMarkerSudah(lat, lng, info) {
      
      var lokasi = new google.maps.LatLng(lat, lng);
      bounds.extend(lokasi);
      var marker = new google.maps.Marker({
        map: map,
        position: lokasi,
        icon : image
      });  
      map.fitBounds(bounds);
      bindInfoWindow(marker, map, infoWindow, info);
     }
	 
	

    // Menampilkan informasi pada masing-masing marker yang diklik
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
  </script>
  
  <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBslVhzS3sdLrw5m1mae_NPwIU5MIlLdXA&callback=initMap">
    </script>
   
  
    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>