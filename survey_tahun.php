<?php
$no=1;
$id_kat=$_GET['id_kat'];
$id_s=$_SESSION['id_s'];
$query1="select * from tbl_pertanyaan a, tbl_kategori b where a.id_kat=b.id_kat and a.id_kat=$id_kat order by a.id_p asc ";
$result1 = mysql_query($query1);	
$hitung1 = mysql_query($query1);
$total1=mysql_num_rows($hitung1);
while ($view1=mysql_fetch_array($result1)){		
?>
	<th style="text-align:center;">P <?php echo $no;?></th>  
	<?php $kategori=$view1['kategori']; $no++; } ?>
                                        