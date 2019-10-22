<?php session_start(); //jalankan session

//include koneksi ke database
include('./inc/koneksi.php');
include('./inc/waktu.php');

//include funsi validation string
include('./inc/validation.php');

if(isset($_GET['page'])){
//bersihkan string 
$page=clstring($_GET['page']);
$halamanC=$page;
}else{
//jika tidak ada request yang dari page isi variable page dengan welcome
	$page="awal";
$halamanC="awal";

}?>


<!DOCTYPE HTML>
<html>

<head>
  <title>Administrator </title>
  <meta name="description" content="" />
  <meta name="keywords" content="" />
 
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/table.css" />

</head>

<body>
  <div id="main">
    <div class="header" align="center">
    </div> 
    <div id="menubar">
      <ul id="nav">
	       <li><a href="home.php">Home</a></li>
	       <li><a href="home.php?page=berita">Berita</a>
         <li><a href="#">Survey </a>  
            <ul>
                <li><a href="home.php?page=kategori_survey">Katagori Survey </a>  </li>
                <li><a href="home.php?page=sub_survey">Pertanyaan Survey </a>  </li>
            </ul>
          </li>     
		      <li><a href="#">Responden</a>
            <ul>
              <?php $qikm="select * from user a, tbl_pesan b where a.id_s=b.id_s group by b.tahun asc";
							$qikm2=mysql_query($qikm);		
					 		while($data_ikm=mysql_fetch_array($qikm2)){
				    			$tahun_ikm=$data_ikm['tahun'];
						  ?>
                <li><a href="home.php?page=data_responden_tahun&tahun=<?php echo $tahun_ikm;?>"> Tahun <?php echo $tahun_ikm;?> </a>
                  <ul>
                    <?php $tikm="select * from user a, tbl_pesan b where a.id_s=b.id_s  and b.tahun = $tahun_ikm group by b.tw asc";
								    $tikm2=mysql_query($tikm);		
					 			    while($tata_ikm=mysql_fetch_array($tikm2)){ ?>
                    <li><a href="home.php?page=data_responden_tw&tahun=<?php echo $tahun_ikm;?>&tw=<?php echo $tata_ikm['tw'];?>">  <?php echo $tahun_ikm;?> <?php echo $tata_ikm['tw'];?> </a>
                    </li>
                    <?php } ?>
                  </li>
                </ul>
                <?php } ?>
                </ul>    
              </li>
              <li><a href="home.php?page=saran">Saran & Kritik</a>
              <li><a href="home.php?page=admin">Admin</a>
              <ul>  
                <li><a href="home.php?page=input_about">About </a>  </li>     </ul>
                </li>
                <li><a href="logout.php">Logout</a></li>
                </ul>
        </div>
    </div>

    <div id="site_content">

     
     
     <div id="content">

	<?php 
                //jika ada request page maka load file dengan nama page 
                if(isset($_GET['page'])){
                    $page=htmlentities($_GET['page']);
                }else{
                // jika tidak ada maka load file welcome.php
                    $page="awal";
                }
                
                $file="$page.php";
                //cek panjang string page
                $cek=strlen($page);
                //jika cek lebih besar dari 30 atau file php dari request page tidak ada atau tidak ada request untuk page maka load file welcome.php
                if($cek>30 || !file_exists($file) || empty($page)){
                    include ("awal.php");
                                
                }else{
                //jika tidak memenuhi kondisi di atas maka load atau include file yang di request oleh link side menu 
                    include ($file);
                }
		
        ?>

        
    </div>



      </div>
    </div>
    
    <p></p>
  </div>
</body>
</html>
