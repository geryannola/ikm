<div class="container-fluid">
<?php if(isset($_GET['tahun'])){
$tahun=intval($_GET['tahun']);


?>
<!--buat tabel-->


<h2> Data responden IKM Tahun <?php echo $tahun;?> </h2>
<table style="margin-left:-10px;" class="responstable">
 <thead>
   <tr>
    <th>No </th>
    <th>NIK</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Umur</th>
    <th>Saran</th>
</tr>
</thead>
<tbody>
<?php    $no=1;

			//jalan query dari database tbl_dosen  total data buat paging
			$query="select * from user a, matrix b, tbl_pesan c where a.id_s=b.id_s and c.id_s=b.id_s and c.tahun='$tahun'  group by b.id_s";
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

			
			
			
			
?>
<!--isi colom tabel dengan nilai hasil query sql di atas-->
                <tr id="col">
                    <td class="fname"><?php echo $no;?></td>
					<td><?php echo $view['nik'];?></td>
                    <td><?php echo $view['nama'];?></td>
                    <td><?php echo $view['email'];?></td>
                    <td><?php echo $view['umur'];?></td>  
                   
                    <td style="text-align:left;"><?php echo $view['pesan'];?></td>
                    <td style="text-align:left;"><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_responden.php?id_s=<?php echo $view['id_s']; ?>';}"><img src="../gambar/button-cross.gif" width="20" height="20" /></a></td>
                    
                </tr>


<?php
			
		$no++;	
			}
			
			


?>

     
                        
 </tbody>   
</table>



    
<?php } ?>

