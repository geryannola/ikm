<div class="agileits_agile_about"> 
	<h3>Pilih Ruangan pada tanggal <?php echo $tanggal;?> </h3>
	<div class="agileits_agile_about_mail">
    	<table>
        	<?php
			$id_s=$_SESSION['id_s'];
			$sql="SELECT * FROM tbl_kategori ORDER BY id_kat DESC";
			$query=mysql_query($sql);
			$no=1;
			while($data=mysql_fetch_array($query)){
				$id_kat=$data['id_kat'];
				$kategori=$data['kategori'];
				$cek=mysql_num_rows(mysql_query("select * from matrix where id_kat=$id_kat and id_s=$id_s"));
				$cek2=mysql_num_rows(mysql_query("select * from tbl_pesan where tw='$tw' and id_s='$id_s'"));
			 ?>
             <tr>
             	<td>
                	<?php echo $kategori; ?>
                </td>
                <td>
                	<?php if($cek > 0 and $cek2 > 0){?>
                    <a href="index.php?page=isi_survey&id_kat=<?php echo $id_kat;?>">Anda Sudah Mengisi Survey</a>
                    <?php } else {?>
                    <a href="index.php?page=survey&id_kat=<?php echo $id_kat;?>">Isi Survey </a>
                    <?php } ?>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>