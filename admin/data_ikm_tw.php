<div class="container-fluid">
<?php if(isset($_GET['tw'])){
$tw=$_GET['tw'];
$tahun=intval($_GET['tahun']);


?>
<!--buat tabel-->



<table style="margin-left:-10px;" class="responstable">
 <thead>
   <tr>
    <th>No Responden</th>
    <?php
	$query1="select * from unsur order by id_u asc ";
	$result1 = mysql_query($query1);	
			$hitung1 = mysql_query($query1);//jumlah data dari query_num	

			$total1=mysql_num_rows($hitung1);
			// lakukan looping untuk mengambil semua data dari hasil query dalam bentuk array
			while ($view1=mysql_fetch_array($result1))
			{		
	?>
     <th>U <?php echo $view1['id_u'];?></th>  
     
     
       
    <?php } ?>
    
   <th> Total </th>
</tr>
</thead>
<tbody>
<?php    $no=1;

			//jalan query dari database tbl_dosen  total data buat paging
			$query="select * from responden a, matrix b where a.id_s=b.id_s and a.tahun='$tahun' and a.tw='$tw' group by b.id_s";
			//jalan query dari database tbl_dosen dengan limit 
			//yang ditentukan oleh paging ambil data untuk ditampilkan pada tabel
			$result = mysql_query($query);	
			$hitung = mysql_query($query);//jumlah data dari query_num	

			$total=mysql_num_rows($hitung);
			// lakukan looping untuk mengambil semua data dari hasil query dalam bentuk array
			while ($view=mysql_fetch_array($result))
			{		
		    //ambil setiap data dan masukan ke variable baru untuk di tampilkan pada tabel
			//$nilai=$view['nilai'];

		
			$id_s=$view['id_s'];
			$id_u=$view['id_u'];
			
?>
<!--isi colom tabel dengan nilai hasil query sql di atas-->
                <tr id="col">
                    <td class="fname"><?php echo $no;?></td>
					<?php 
					$nilai2=0;
                    $matrix="select * from  matrix  where id_s=$id_s ";
                    $result2=mysql_query($matrix);
                    while($view2=mysql_fetch_array($result2)){
						$nilai=$view2['nilai'];
						$nilai2=$nilai + $nilai2;
						
						
						?>
                    
                        <td class="fname"><?php echo $nilai;?></td>
                    <?php 
					
					} 
					
					?>
                    
                   <td><?php echo $nilai2;?></td>
                    
                </tr>


<?php
			
		$no++;	
			}
			
			


?>

<tr>
<td>Total</td>
			
                    
              <?php  
			  $total=0;
			  $sql="select * from unsur ";
			  $query=mysql_query($sql);
			  while($data=mysql_fetch_array($query)){ 
			  $id_u=$data['id_u'];                         
			  ?>
              
             
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, responden b where a.id_u=$id_u and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){    
			  $total+=$ndata['nrr'];
			   ?>                     
<td><div align="center"><?php echo $ndata['nrr']; ?></div></td>
			  <?php }
				 
				 
				 ?>
                 
                
               <?php } ?>
                      <td><?php echo $total;?></td>
                    
                    
</tr>   
<tr>
<td> Rata-Rata</td>
  <?php  
			  $total=0;
			  $responden=mysql_num_rows(mysql_query("select * from responden where tahun='$tahun' and tw='$tw'"));
			  $sql="select * from unsur ";
			  $query=mysql_query($sql);
			  while($data=mysql_fetch_array($query)){ 
			  $id_u=$data['id_u'];                         
			  ?>
              
             
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, responden b where a.id_u=$id_u and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){    
			  $total+=number_format($ndata['nrr']/$responden,2);
			   ?>                     
<td><div align="center"><?php echo number_format( $ndata['nrr'] / $responden,2); ?></div></td>

			  <?php }
				 
				 
				 ?>
                 
                
               <?php } ?>
                   <td><?php echo $total;?></td>
                    
</tr>                 

<tr>
<td> Rata-Rata Tertimbang</td>
  <?php  
			  $total=0;
			  $responden=mysql_num_rows(mysql_query("select * from responden where tahun='$tahun' and tw='$tw'"));
			  $sql="select * from unsur ";
			  $query=mysql_query($sql);
			  while($data=mysql_fetch_array($query)){ 
			  $id_u=$data['id_u'];                         
			  ?>
              
             
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, responden b where a.id_u=$id_u and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){    
			 
			   $nrx=number_format( $ndata['nrr'] / $responden,2);
			   $nrx2=number_format($nrx*0.07,2);
			    $total+=$nrx2
			   ?>                     
<td><div align="center"><?php echo number_format($nrx*0.07,2); ?></div></td>

			  <?php }
				 
				 
				 ?>
                 
                
               <?php } ?>
                     <td><?php echo $total;?></td>
                    
</tr>                 
                        
 </tbody>   
</table>


<table class="responstable">
 <thead>
   <tr>
    <th>No</th>
    <th>Unsur</th>
    <th>Total </th>
    <th>Nilai Rata-Rata </th>
    <th>Nilai Rata-Rata Tertimbang</th>
    
    </tr>
    </thead>
<tbody>

 <?php
 			  $nrx3=0;

    
			  $sql="select * from unsur ";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){ 
			  $id_u=$data['id_u'];                         
			  ?>
              <tr>
                <td><div align="center"><?php echo $no ?></div></td>
                 <td><div align="left"><?php echo $data['unspl']; ?></div></td>
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, responden b where a.id_u=$id_u and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){     ?>                     
<td><div align="center"><?php echo $ndata['nrr']; ?></div></td>
			  <?php }?>
              
            
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, responden b where a.id_u=$id_u and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){     ?>                     
<td><div align="center"><?php echo number_format($ndata['nrr'] / $responden,2); ?></div></td>
			  <?php }?>
              
                <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, responden b where a.id_u=$id_u and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){ 
			  $nrx=number_format($ndata['nrr'] / $responden,2);
			  $nrx2=number_format($nrx*0.07,2);
			  $nrx3=$nrx2+$nrx3;
			      ?>                     
<td><div align="center"><?php echo number_format($nrx * 0.07,2); ?>   </div></td>
			  <?php }?>
              
                 
                
               <?php $no++;} ?>
			</tr>
            <tr>
            <td colspan="4">Indexs Kepuasan Masyarakat </td>
            <?php 
			if($nrx3 >=1.00 and $nrx3 <= 1.75){
				$kualitas="Tidak Baik";
				
			}else if($nrx3 >=1.75 and $nrx3 <= 2.51){
				$kualitas="Kurang Baik";
				
			}else if($nrx3 >=2.51 and $nrx3 <= 3.26){
				$kualitas="Baik";
				
			}else if($nrx3 >=3.26 and $nrx3 <= 4.00){
				$kualitas="Sangat Baik";
				
				
			} ?>
			
			<td><b><?php echo $nrx3. " ( $kualitas ) ";?></b></td>
             </tr>
             <tr>
             <td colspan="4">Konversi IKM </td>
            <?php 
			
			$konversi=number_format($nrx3*25,2);
			
			if($konversi >=25 and $konversi <= 43.75){
				$mutu="D (Tidak Baik)";				
				
			}else if($konversi >=43.76 and $konversi <= 62.50){
				$mutu="C (Kurang Baik)";
			}else if($konversi >=62.51 and $konversi <= 81.25){
				$mutu="B (Baik)";
			}else if($konversi >=81.26 and $konversi <= 100){
				$mutu="A (Sangat Baik)";
				
			}
			
			
			
			?><td><b><?php echo $konversi;?></b></td>
            </tr>
             <tr>
             <td colspan="4">Mutu Pelayanan </td>
            <td><b><?php echo $mutu;
			
			?></b></td>
            </tr>
</tbody>
</table>
    
<?php } ?>

