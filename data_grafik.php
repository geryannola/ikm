<script src="./Chart.bundle.js"></script>

<?php if(isset($_GET['tahun'])){
$id_kat=intval($_GET['kat']);

$tahun=intval($_GET['tahun']);

?>

<div class="agileits_agile_about">
										<h3>Grafik Survey</h3>
										<div class="agileits_agile_about_mail">
 


 
    



            <canvas id="myChart" width="100%" height="50"></canvas>
        
<?php        
$tikm="select * from tbl_pesan where tahun = $tahun and id_kat=$id_kat group by tw asc";
								$tikm2=mysql_query($tikm);		
					 			  ?>
                                                                   
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php $tikm="select * from tbl_pesan where tahun = $tahun and id_kat=$id_kat group by tw asc";
								$tikm2=mysql_query($tikm);	
								while($tata_ikm=mysql_fetch_array($tikm2)) { echo '"' . $tata_ikm['tw'] . '",';}?>],
                    datasets: [{
                            label: '# Nilai IKM',
                            data: [<?php
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
			 
                 
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){
			  }?>
              
            
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat  and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){ }?>
              
                <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw";
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
			
}?>],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
        

 <?php } ?>
 
 <table class="responstable">
 <thead>
   <tr>
   
    <th style=" text-align:center; min-width:220px;">Triwulan</th>
    <th style=" text-align:center; min-width:100px;">Nilai</th>
    
    
    
    </tr>
    </thead>
<tbody>
 
<?php 
$total_kon=0;
$tikm="select * from tbl_pesan where tahun = $tahun and id_kat=$id_kat group by tw asc";
								$tikm2=mysql_query($tikm);	
								$tcount=mysql_num_rows($tikm2);
								while($tata_ikm=mysql_fetch_array($tikm2)) {?>
									
									

									 <?php }?>
                                
                                
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
			 
                 
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){
			  }?>
              
            
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat  and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){ }?>
              
                <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw";
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
			
			//echo '"' .$konversi. '",';
			?>
		<tr>
                                   
         <td><?php echo $ntata_ikm['tw'];?></td>                         
		 <td><?php echo $konversi;?></td>	
        </tr>
        
        
       
<?php $total_kon=$total_kon+$konversi;}?>
      </tbody>   
</table>
 <table class="responstable">
 <thead>
   <tr>
   
    <th style=" min-width:220px;">Nilai Ikm Tahun <?php echo $tahun;?></th>
    <th style=" min-width:100px;"> <?php echo number_format($total_kon/$tcount,2);?></th>
    
    
    
    </tr>
    </thead>

</table>