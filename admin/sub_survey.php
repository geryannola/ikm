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
                    
					"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
       				 "iDisplayLength": 25,
					 "aaSorting":[[2, "asc"]],
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
$text="Input Data Pertanyaan";


if(isset($_POST['simpan'])){
	
$pertanyaan=$_POST['pertanyaan'];
$id_kanal=$_POST['kanal'];

	if(empty($pertanyaan)){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Pertanyaan Belum Di Isi');
	}
	</script>";
}else{
$a="insert into tbl_pertanyaan(pertanyaan,id_kat)values('$pertanyaan','$id_kanal')";
$b=mysql_query($a);
	if($b){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Pertanyaan Berhasil Di Simpan Ke Database');
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

if(isset($_GET['id_pertanyaan'])){
$id_pertanyaan=$_GET['id_pertanyaan'];
$text="Edit Data Pertanyaan";

}else{
	$id_pertanyaan='';
}


	
$sql="select * from tbl_pertanyaan where id_p='$id_pertanyaan'";
$query=mysql_query($sql);
$baris=mysql_fetch_array($query);



if(isset($_POST['edit'])){
	
$id_pertanyaan=$_POST['id_pertanyaan'];
$pertanyaan=$_POST['pertanyaan'];
$id_kanal=$_POST['kanal'];

$a="Update tbl_pertanyaan set pertanyaan='$pertanyaan',id_kat='$id_kanal' where id_p='$id_pertanyaan'";
$b=mysql_query($a);
if($b){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Pertanyaan Berhasil Di Simpan Ke Database');
	}
	</script>";

}else{
echo "Data gagal diubah";
}
}

?>


<h2><?php echo $text;?></h2>


<div class="box1">
 
 
 

        <form action="home.php?page=sub_survey" method="post">
          <div class="form_settings" style="">
          
           <?php if(empty($id_pertanyaan)){?>
            <p style="font-size:18px;"><span>Pertanyaan </span>
            <textarea name="pertanyaan"> </textarea>
            </p> 
            <p style="font-size:18px;"><span>Pilih Kategori</span>
            <select name="kanal">
            
            <?php
                       $query = mysql_query("SELECT * FROM tbl_kategori ");
                       if($query && mysql_num_rows($query) > 0){
                          while($row = mysql_fetch_array($query)){
                             echo '<option style="margin-left:5px;" value="'.$row['id_kat'].'"';
                              echo ' selected';
                             echo '>'.$row['kategori'].'</option>';
                          }
                       }	   
                    ?>
                    </select>
                   </p> 
                      
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit"  type="submit" name="simpan" 
            value="Simpan" /> </p>
            <?php } else{ ?>
            <input type="hidden" name="id_pertanyaan" value="<?php echo $baris['id_p'];?>"/>
            <p><span>Pertanyaan</span>
            <textarea name="pertanyaan"><?php echo $baris['pertanyaan'];?></textarea>
</p> 
            
              <p><span>Pilih Kategori</span>        
                      <select name="kanal">
            
            <?php
                       $query = mysql_query("SELECT * FROM tbl_kategori ");
                       if($query && mysql_num_rows($query) > 0){
                          while($row = mysql_fetch_array($query)){
                             echo '<option style="margin-left:5px;" value="'.$row['id_kat'].'"';
                             if($row['id_kat'] == $baris['id_kat']) echo ' selected';
                             echo '>'.$row['kategori'].'</option>';
                          }
                       }	   
                    ?>
                    </select>
                   </p> 
                      
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit"  type="submit" name="edit" 
            value="Edit" /> </p>
            
            <?php } ?>
          </div>
        </form>
        
        
      
        
        </div>
        
        
        <div class="box2">    
            
            <div class="content_top">
    		<div class="heading">
        <h2>Data Pertanyaan Survey Kepuasan Masyarakat</h2>
    		</div>
    	</div>
            <table id="datatables" class="display">
              <thead>
                    <tr>
                        
						<th>Kategori</th>
						<th>Pertanyaan</th>

                        <th width="100px;"><div align="center">Aksi</div></th>
                        
                    </tr>
                </thead>
 <tbody>
			  <?php
			  $sql="select * from tbl_kategori a ,tbl_pertanyaan b where b.id_kat=a.id_kat order by b.id_p DESC";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){
			  ?>
              <tr>
                
                <td><?php echo $data['kategori']; ?></td>
                <td><?php echo $data['pertanyaan']; ?></td>
               
               <td><div align="center"><a href="home.php?page=sub_survey&id_pertanyaan=<?php echo $data['id_p']; ?>"><img src="../gambar/button-edit.gif" width="20" height="20" /></a><a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_sub_survey.php?id_pertanyaan=<?php echo $data['id_p']; ?>';}"><img src="../gambar/button-cross.gif" width="20" height="20" /></a> </div></td>
              </tr>
             <?php 
			 $no++;
			 }?>
             </tbody>
            </table>
           
          </div> 