<?php if(isset($_GET['id'])){
$id=intval($_GET['id']);


?>


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
   <th>Opt</th>
</tr>
</thead>
<tbody>
<?php    $no=1;

			//jalan query dari database tbl_dosen  total data buat paging
			$query="select * from responden a, matrix b where a.id_s=b.id_s and a.id_s='$id'  LIMIT 1";
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
                    <td><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus.php?id=<?php echo $view['id_s']; ?>';}">Hapus</a></td>
                    
                </tr>

<div> <b>Nama Responden : <?php echo $view['nama'];?></b></div>
<?php
			
		$no++;	
			}

			


?>

<tr>

</tr>
</tbody>
</table>

<?php } ?>

