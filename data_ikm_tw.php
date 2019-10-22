
<?php if(isset($_GET['tw'])){
$tw=$_GET['tw'];
$id_kat=intval($_GET['kat']);

$tahun=intval($_GET['tahun']);

switch($tw){
	case 'Triwulan Ke 1':
	$txt='tw1';
	break ;
	case 'Triwulan Ke 2':
	$txt='tw2 ';
	break ;
	case 'Triwulan Ke 3':
	$txt='tw3 ';
	break ;
	case 'Triwulan Ke 4':
	$txt='tw4';
	break ;
	
}
?>

<div class="agileits_agile_about">
										<h3>Hasil Survey </h3>
										<div class="agileits_agile_about_mail">
 


<table style="margin-left:-10px; font-size:12px;" class="responstable">
 <thead>
   <tr>
    <th>No. Nama</th>
		<?php
	
	$query1="select * from tbl_pertanyaan where id_kat=$id_kat  order by id_p asc ";
	$result1 = mysql_query($query1);	
			$hitung1 = mysql_query($query1);//jumlah data dari query_num	

			$total1=mysql_num_rows($hitung1);
			$nprxz=1/$total1;
			
			$no1=1;
			// lakukan looping untuk mengambil semua data dari hasil query dalam bentuk array
			while ($view1=mysql_fetch_array($result1))
			{		
	?>
     <th style="text-align:center;">P <?php echo $no1;?></th>  
     
     
       
    <?php $no1++;} ?>
    
   <th> Total </th>
</tr>
</thead>
<tbody>
<?php    $no=1;

			//jalan query dari database tbl_dosen  total data buat paging
			$query="select * from tbl_pesan a, matrix b, user c where a.id_s=b.id_s and c.id_s=a.id_s and b.id_kat=$id_kat and a.tahun='$tahun' and a.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw group by b.id_s";
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
			$id_p=$view['id_p'];
			
			$nama=$view['nama'];
			
?>
<!--isi colom tabel dengan nilai hasil query sql di atas-->
                <tr id="col">
                    <td style="" ><?php echo $no;?>. <?php echo $nama;?> </td>					
					<?php 
					$nilai2=0;
                    $matrix="select * from  matrix  where id_s=$id_s and tahun=$tahun and tw='$tw' and id_kat=$id_kat ";
                    $result2=mysql_query($matrix);
                    while($view2=mysql_fetch_array($result2)){
						$nilai=$view2['nilai'];
						$nilai2=$nilai + $nilai2;
						
						
						?>
                    
                        <td class="fname" style="text-align:center;"><?php echo $nilai;?></td>
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
			  $sql="select * from tbl_pertanyaan where id_kat=$id_kat ";
			  $query=mysql_query($sql);
			  while($data=mysql_fetch_array($query)){ 
			  $id_p=$data['id_p'];                         
			  ?>
              
             
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_s=b.id_s and a.id_kat=$id_kat and a.id_kat=b.id_kat and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw  ";
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
			  $responden=mysql_num_rows(mysql_query("select * from tbl_pesan where id_kat=$id_kat and tahun='$tahun' and tw='$tw'"));
			  $sql="select * from tbl_pertanyaan where id_kat=$id_kat ";
			  $query=mysql_query($sql);
			  while($data=mysql_fetch_array($query)){ 
			  $id_p=$data['id_p'];                         
			  ?>
              
             
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_kat=$id_kat and a.id_p=$id_p and  a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw";
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
	<td colspan="<?php echo $total1+1;?>">Konstanata  Rata-Rata Terimbang,  1 / Jumlah Pertanyaan = 1 / <?php echo $total1;?></td>
    <td><?php echo number_format($nprxz,2);?></td>
</tr>


<tr>
<td> Rata-Rata Tertimbang</td>
  <?php  
			  $total=0;
			  $responden=mysql_num_rows(mysql_query("select * from tbl_pesan where id_kat=$id_kat and tahun='$tahun' and tw='$tw'"));
			  $sql="select * from tbl_pertanyaan where id_kat=$id_kat";
			  $query=mysql_query($sql);
			  while($data=mysql_fetch_array($query)){ 
			  $id_p=$data['id_p'];                         
			  ?>
              
             
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){    
			 
			   $nrx=number_format( $ndata['nrr'] / $responden,2);
			   $nrx2=number_format($nrx*$nprxz,2);
			    $total+=$nrx2
			   ?>                     
<td><div align="center"><?php echo number_format($nrx*$nprxz,2); ?></div></td>

			  <?php }
				 
				 
				 ?>
                 
                
               <?php } ?>
                     <td><?php echo $total;?></td>
                    
</tr>                 
                        
 </tbody>   
</table>

    


<table class="responstable" style="margin-left:-10px; font-size:12px;">
 <thead>
   <tr>
     <th style=" text-align:center; min-width:20px;">No</th>
    <th style=" text-align:center; min-width:220px;">Unsur</th>
    <th style=" text-align:center; min-width:100px;">Total </th>
    <th style=" text-align:center; min-width:150px;">Nilai Rata-Rata </th>
    <th style=" text-align:center; min-width:200px;">Nilai Rata-Rata Tertimbang</th>
    
    
    </tr>
    </thead>
<tbody>
 

 <?php
 			  $nrx3=0;

    
			  $sql="select * from tbl_pertanyaan where id_kat=$id_kat ";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){ 
			  $id_p=$data['id_p'];                         
			  ?>
              <tr>
                <td><div align="center"><?php echo $no ?></div></td>
                 <td><div align="left"><?php echo $data['pertanyaan']; ?></div></td>
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){     ?>                     
<td><div align="center"><?php echo $ndata['nrr']; ?></div></td>
			  <?php }?>
              
            
                 <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat  and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){     ?>                     
<td><div align="center"><?php echo number_format($ndata['nrr'] / $responden,2); ?></div></td>
			  <?php }?>
              
                <?php
			  $nsql="select SUM(nilai) AS nrr from matrix a, tbl_pesan b where a.id_p=$id_p and a.id_kat=$id_kat and a.id_kat=b.id_kat and a.id_s=b.id_s and b.tahun='$tahun' and b.tw='$tw' and a.tahun=b.tahun and a.tw=b.tw ";
			  $nquery=mysql_query($nsql);
			  while($ndata=mysql_fetch_array($nquery)){ 
			  $nrx=number_format($ndata['nrr'] / $responden,2);
			  $nrx2=number_format($nrx*$nprxz,2);
			  $nrx3=$nrx2+$nrx3;
			      ?>                     
<td><div align="center"><?php echo number_format($nrx * $nprxz,2); ?>   </div></td>
			  <?php }?>
              
                 
                
               <?php $no++;} ?>
			</tr>
            <tr>
            <td colspan="4"><div ><b>Indexs Kepuasan Masyarakat</b></div> </td>
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
			
			<td style="text-align:center;"><b><?php echo $nrx3. " ( $kualitas ) ";?></b></td>
             </tr>
             <tr>
             <td colspan="4"><div><b>Konversi IKM</b></div> </td>
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
			
			
			
			?><td style="text-align:center;"><b><?php echo $konversi;?></b></td>
            </tr>
             <tr>
             <td colspan="4"><div><b>Mutu Pelayanan</b></div> </td>
            <td style="text-align:center;"><b><?php echo $mutu;
			
			?></b></td>
            </tr>
</tbody>
</table>
    
<?php } ?>

 </div>
 <div><a target="_blank" href="pdf.php?&kat=<?php echo $id_kat;?>&tahun=<?php echo $tahun;?>&tw=
 	<?php echo $txt;?>"> <b>pdf</b> </a></div>
 
      </div>
 