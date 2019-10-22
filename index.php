<?php session_start(); //jalankan session

//include koneksi ke database
include('./inc/koneksi.php');
//include('./inc/check.php');

include('./inc/waktu.php');

//include funsi validation string
include('./inc/validation.php');
 include('./tw.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Indeks Kepuasan Masyarakat</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern CV Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/swipebox.css">
<link rel="stylesheet" href="style.css" type="text/css">

<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<!-- //js -->

</head>
	
<body>
	<div class="banner_body">
		<div class="container">
			<div class="w3ls_logo_nav">
				<div class="w3ls_logo_nav_right">
					<div class="sap_tabs">
						<div class="w3ls_logo_nav_left"  style="color:#FFF;">
							<h2>Indeks Kepuasan Masyarakat </br> </h2>
						</div>
                        
						<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
							<div class="resp-tabs-container">
								
								<ul class="resp-tabs-list">
									<li class="resp-tab-item" ><a href="index.php">Home</a></li>
									<li class="resp-tab-item" ><a href="index.php?page=puas">Kepuasan</a></li>
                                     <?php if(isset($_SESSION['id_s'])){?>
                                    <li class="resp-tab-item" ><a href="index.php?page=kat_survey">Survei</a></li>
                                    <?php } else { ?>
                                     <li class="resp-tab-item" ><a href="index.php?page=login">Survei</a></li>
                                    <?php } ?>
									<li class="resp-tab-item" ><a href="index.php?page=hasil_survey">Hasil Survei</a></li>
                                    <li class="resp-tab-item" ><a href="index.php?page=grafik">Grafik</a></li>
                                    
									<li class="resp-tab-item" ><a href="index.php?page=saran">Kritik & Saran</a></li>
                                    <?php if(isset($_SESSION['id_s'])){?>
									<li class="resp-tab-item" ><a href="index.php?page=logout">Logout</a></li>
                                    <?php } else {?>
									<li class="resp-tab-item" ><a href="index.php?page=login">Login</a></li>
                                    
                                    <?php } ?>
								</ul>
							
								
								<div class="tab-4 resp-tab-content" aria-labelledby="tab_item-4">
				<!-- blog -->
									<?php 
                //jika ada request page maka load file dengan nama page 
                if(isset($_GET['page'])){
                    $page=htmlentities($_GET['page']);
                }else{
                // jika tidak ada maka load file welcome.php
                    $page="login";
                }
                
                $file="$page.php";
                //cek panjang string page
                $cek=strlen($page);
                //jika cek lebih besar dari 30 atau file php dari request page tidak ada atau tidak ada request untuk page maka load file welcome.php
                if($cek>30 || !file_exists($file) || empty($page)){
                    include ("berita.php");
                                
                }else{
                //jika tidak memenuhi kondisi di atas maka load atau include file yang di request oleh link side menu 
                    include ($file);
                }
		
        ?>
									
				<!-- //blog -->
								</div>
								
			<!-- //contact -->
							</div>
						</div>
						
					</div>
					<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
						<script type="text/javascript">
							$(document).ready(function () {
								$('#horizontalTab').easyResponsiveTabs({
									type: 'default', //Types: default, vertical, accordion           
									width: 'auto', //auto or any width like 600px
									fit: true   // 100% fit in a container
								});
							});			
						</script>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="agileits_copyright">
				<p> </p>
			</div>
		</div>
	</div>
<!-- for bootstrap working -->
<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
</body>
</html>