<script src="Chart.bundle.js"></script>

<?php if(isset($_GET['tahun'])){
$id_kat=intval($_GET['kat']);

$tahun=intval($_GET['tahun']);

?>

<div class="agileits_agile_about">
										<h3>Grafik Survey</h3>
										<div class="agileits_agile_about_mail">
 


 
    


 </div>
 
 
      </div>
      
      <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
<?php        
$tikm="select * from tbl_pesan where tahun = $tahun and id_kat=$id_kat group by tw asc";
								$tikm2=mysql_query($tikm);		
					 			  ?>
                                                                   
        <?php $tikm="select * from tbl_pesan where tahun = $tahun and id_kat=$id_kat group by tw asc";
								$tikm2=mysql_query($tikm);	
								while($tata_ikm=mysql_fetch_array($tikm2)) { echo '"' . $tata_ikm['tw'] . '",';}?>
                 <?php
$ntikm="select * from tbl_pesan where tahun = $tahun and id_kat=$id_kat group by tw asc";
$ntikm2=mysql_query($ntikm);		
while($ntata_ikm=mysql_fetch_array($ntikm2)){
	
	$tw=$ntata_ikm['tw'];
	
			$query1="select * from tbl_pertanyaan where id_kat=$id_kat ";
			$result1 = mysql_query($query1);	
			$hitung1 = mysql_query($query1);//jumlah data dari query_num	

			$total1=mysql_num_rows($hitung1);
			$nprxz=1/$total1;
	
	         $responden=mysql_num_rows(mysql_query("select * from tbl_pesan where id_kat=$id_kat and tahun='$tahun' and tw='$tw'"));     
		
			  $total=0;
 			  $nrx3=0;    
			  $sql="select * from tbl_pertanyaan where id_kat=$id_kat ";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){ 
			  $id_p=$data['id_p'];                         
			 
                 
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){
			  }?>
              
            
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat  and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){ }?>
              
                <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){ 
			  $nrx=number_format($ndata['nrr'] / $responden,2);
			  $nrx2=number_format($nrx*$nprxz,2);
			  $nrx3=$nrx2+$nrx3;
			    } $no++;} ?>
                
			 <?php 
			if($nrx3 >=1.00 and $nrx3 <= 1.75){
				$kualitas="Tidak Baik";
				
			}else if($nrx3 >=1.75 and $nrx3 <= 2.51){
				$kualitas="Kurang Baik";
				
			}else if($nrx3 >=2.51 and $nrx3 <= 3.26){
				$kualitas="Baik";
				
			}else if($nrx3 >=3.26 and $nrx3 <= 4.00){
				$kualitas="Sangat Baik";
				
				
			} else if($nrx3 > 4.00){
				$kualitas="Sangat Baik";
			}?>
			
            <?php 
			
			$konversi=number_format($nrx3*25,2);
			
			if($konversi >=25 and $konversi <= 43.75){
				$mutu="D (Tidak Baik)";				
				
			}else if($konversi >=43.76 and $konversi <= 62.50){
				$mutu="C (Kurang Baik)";
			}else if($konversi >=62.51 and $konversi <= 81.25){
				$mutu="B (Baik)";
			}else if($konversi >=81.26 and $konversi <= 100 ){
				$mutu="A (Sangat Baik)";
				
			}else if($konversi > 100){
				$mutu="A (Sangat Baik)";
			}
			
			echo '"' .$konversi. '",';
			
}?>
                           
 <?php } ?>
