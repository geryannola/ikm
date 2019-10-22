 <script src="media/js/jquery.js" type="text/javascript"></script>
        <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
        <link rel="StyleSheet" href="css/style.css" type="text/css" />
        <style type="text/css">
            @import "media/css/demo_table_jui.css";
            @import "media/themes/ui-lightness/jquery-ui-1.8.4.custom.css";
        </style>
        
        <style>
            *{
                font-family: arial;
            }
        </style>
        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $('#datatables').dataTable({
                    "sPaginationType":"full_numbers",
                    "aaSorting":[[2, "desc"]],
                    "bJQueryUI":true
                });
            })
            
        </script>

<style>
table{border:none;}
tr{border:none;}
td{border:none;}
</style>
<?php
$text="Input Kategori Pertanyaan Survey Kepuasan Masyarakat";


if(isset($_POST['simpan'])){
	
$nama_kategori=$_POST['nama_kategori'];
	if(empty($nama_kategori)){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Nama Kategori belum diisi');
	}
	</script>";
}else{
$a="insert into tbl_kategori(kategori)values('$nama_kategori')";
$b=mysql_query($a);
	if($b){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Telah Tersimpan');
	}
	</script>";
	}else{
	echo "Data gagal disimpan";
	}
}
unset($_POST['simpan']);
}

//Proses edit
//tampilkan data yang diedit

if(isset($_GET['id_kategori'])){
$id_kategori=$_GET['id_kategori'];
$text="Edit Kategori Pertanyaan Survey Kepuasan Masyarakat";

}else{
	$id_kategori='';
}


	
$sql="select * from tbl_kategori where id_kat='$id_kategori'";
$query=mysql_query($sql);
$baris=mysql_fetch_array($query);



if(isset($_POST['edit'])){
	
$id_kategori=$_POST['id_kategori'];
$nama_kategori=$_POST['nama_kategori'];

$a="Update tbl_kategori set kategori='$nama_kategori' where id_kat='$id_kategori'";
$b=mysql_query($a);
if($b){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Telah Tersimpan');
	}
	</script>";

}else{
echo "Data gagal diubah";
}
}

?>


<h2><?php echo $text;?></h2>


<div class="box1">
 
 
 

        <form action="home.php?page=kategori_survey" method="post">
          <div class="form_settings" style="">
          
           <?php if(empty($id_kategori)){?>
            <p style="font-size:18px;"><span>Nama Kategori</span><input class="contact" type="text" name="nama_kategori" value="" /></p> 
            
                      
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit"  type="submit" name="simpan" 
            value="Simpan" /> </p>
            <?php } else{ ?>
            <input type="hidden" name="id_kategori" value="<?php echo $baris['id_kat'];?>"/>
            <p><span>Nama Kategori</span><input class="contact" type="text" name="nama_kategori" value="<?php echo $baris['kategori'];?>" /></p> 
            
                      
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit"  type="submit" name="edit" 
            value="Edit" /> </p>
            
            <?php } ?>
          </div>
        </form>
        
        
      
        
        </div>
        
        
        <div class="box2">    
            
            <div class="content_top">
    		<div class="heading">
        <h2>Data Kategori Pertanyaan Survey Kepuasan Masyarakat</h2>
    		</div>
    	</div>
            <table id="datatables" class="display">
              <thead>
                    <tr>
                        <th width="50px;">No</th>
						<th>Nama Kategori</th>
                        <th>Jumlah Pertanyaan</th>
                        <th width="100px;"><div align="center">Aksi</div></th>
                        
                    </tr>
                </thead>
 <tbody>
			  <?php
			  $sql="select * from tbl_kategori order by id_kat ASC";
			  $query=mysql_query($sql);
			  
			  $no=1;
			  while($data=mysql_fetch_array($query)){
				$id_kat=$data['id_kat'];  
			  $sql_count="select * from tbl_pertanyaan where id_kat='$id_kat'";
			  $query_count=mysql_query($sql_count);
			  $jumlah=mysql_num_rows($query_count);
				  
			  ?>
              <tr>
                <td><div align="center"><?php echo $no; ?></div></td>
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $jumlah; ?></td>
               
               <td><div align="center"><a href="home.php?page=kategori_survey&id_kategori=<?php echo $data['id_kat']; ?>"><img src="../gambar/button-edit.gif" width="20" height="20" /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_kategori.php?id_kategori=<?php echo $data['id_kat']; ?>';}"><img src="../gambar/button-cross.gif" width="20" height="20" /></a> </div></td>
              </tr>
             <?php 
			 $no++;
			 }?>
             </tbody>
            </table>
           
          </div> 