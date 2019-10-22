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

.gambar_produk{
	width:350px;
	height:auto;
	background-color:#FFF;
	padding:10px;
	
}

</style>

<style>
.produk_input{
	width:500px;
	height:30px;
	padding-left:10px;
	
}

.select{
	width:270px;
	height:30px;
	font-size:18px;
	padding-top:5px;
	
}

.harga{
	width:200px;
	height:30px;
	padding-left:10px;
}

.stok{
	width:50px;
	height:30px;
	padding-left:5px;
}
input[type="submit"]{
  font: 100% arial; 
  border: 1px solid; 
  width: 99px; 
 
  height: 33px;
  padding: 2px 0 3px 0;
  cursor: pointer; 
  background: #3B3B3B; 
  color: #FFF;
}
input[type="reset"]{
 font: 100% arial; 
  border: 1px solid; 
  width: 99px; 
 
  height: 33px;
  padding: 2px 0 3px 0;
  cursor: pointer; 
  background:#06C;
  color: #FFF;


}
</style>

<!-- Load TinyMCE -->
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="../tinymce/jquery.tinymce.js"></script>
<script type="text/javascript">
        $().ready(function() {
                $('.isi').tinymce({
					
					 document_base_url: "../",
                        // Location of TinyMCE script
                        script_url : '../tinymce/tiny_mce.js',


                        // General options
						mode : "textareas",
                        theme : "advanced",
                        plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist,imagemanager",

                        // Theme options
                        theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
                        theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,forecolor,backcolor",
                        theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,charmap,emotions,media,|,print,|,fullscreen",
                        theme_advanced_toolbar_location : "top",
                        theme_advanced_toolbar_align : "left",
                        theme_advanced_statusbar_location : "bottom",
                        theme_advanced_resizing : true,

                        
                });
        });
</script>

<!-- /TinyMCE -->


<?php

$text="Input Berita Survey Kepuasan Masyarakat";

if(isset($_POST['simpan'])){
$judul=$_POST['judul'];
$isi=$_POST['isi'];
$tgl_masuk=date("Y-m-d");


$gambar=$_FILES['gambar']['name'];
if(strlen($gambar)>0){
	if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../gambar/berita/".$gambar);
	}
}
$a="insert into tbl_berita(judul,isi,tanggal,gambar)values('$judul','$isi','$tgl_masuk','$gambar')";
$b=mysql_query($a);
if($b){
echo "<script type='text/javascript'>
	onload =function(){
	alert('Berita telah tersimpan');
	}
	</script>";
}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert('Berita gagal disimpan');
	}
	</script>";
}
}
//Proses edit
//tampilkan data yang diedit
if(isset($_GET['id_berita'])){
$id_berita=$_GET['id_berita'];
$text="Edit Berita Survey Kepuasan Masyarakat";

}else{
	$id_berita='';
}
$sql="select * from tbl_berita where id_berita='$id_berita'";
$query=mysql_query($sql);
$baris=mysql_fetch_array($query);

if(isset($_POST['Edit'])){
$judul=$_POST['judul'];
$isi=$_POST['isi'];

$gambar=$_FILES['gambar']['name'];
	if(strlen($gambar)>0){
	if(is_uploaded_file($_FILES['gambar']['tmp_name'])){
	move_uploaded_file($_FILES['gambar']['tmp_name'],"../gambar/berita/".$gambar);
	}
mysql_query("update tbl_berita set gambar='$gambar' where id_berita='$id_berita'");
}
$a="Update tbl_berita set judul='$judul',isi='$isi' where id_berita='$id_berita'";
$b=mysql_query($a);
if($b){
echo "<script>alert('Data berhasil disimpan!'); window.location.assign('home.php?page=berita');</script>";
}else{
echo "<script type='text/javascript'>
	onload =function(){
	alert('Berita gagal diubah!');
	}
	</script>";
}
}

?>



<h2><?php echo $text;?></h2>


      <table width="100%" border="0" align="center" cellpadding="1" cellspacing="0">
        <tr>
          <td width="100%"><h3 class="caption" align="center"></h3><br/>
            <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
              <table width="100%" border="0" align="center">
                
                
                 
                  <td><strong>Gambar</strong></td>
                  <td><label>
				  <?php if(!empty($id_berita)){
				//tampilkan foto saat mau ngedit
				 echo "<img src='../gambar/berita/$baris[gambar]' class='gambar_produk'> <br />";
				} 
				?>
				  
                  <input name="gambar" type="file" id="gambar" class="file_1"/>
                  
                  </label></td>
                </tr>  
				<tr>
                  <td width="295"><strong>Judul Berita  </strong></td>
                  <td width="295"><label>
                    <input name="judul" type="text" id="nama_produk" size="50" class="produk_input" value="<?php echo $baris['judul'];?>"/>
                  </label></td>
                </tr>
                
                <tr>
                  <td><strong>Isi Berita</strong></td>
                  <td><label>
                    <textarea name="isi" cols="80" rows="15" class="isi" id="deskripsi"><?php echo $baris['isi'];?></textarea>
                  </label></td>
                </tr>
                  <td>&nbsp;</td>
                  <td>
        
        <div style="margin-top:20px;"></div>

                  <label>
                    <?php if(empty($id_berita)){
		//bila mau tambah data yang tampil tombol simpan
		echo "<input name=\"simpan\" type=\"submit\" id=\"simpan\" value=\"Simpan\" class=\"form-submit\" />&nbsp;";
		echo "<input name=\"batal\" type=\"reset\" id=\"batal\" value=\"Batal\" class=\"form-reset\" />";
        } else {
		//Apabila mau edit yg tampil tombol edit dan hapus
		echo "<input name=\"Edit\" type=\"submit\" id=\"edit\" value=\"Edit\" class=\"form-edit\" />";
		} ?>
                  </label></td>
                </tr>
              </table>
            </form>
            
            <div style="margin-top:20px;"></div>
            
            
            
            <div class="content_top">
    		<div class="heading">
            <h2>DATA BERITA </h2>
    		</div>
    	</div>
            <div class="box2">                                   
             <table id="datatables" class="display">
              <thead>
                    <tr>
                        <th width="50px;">No</th>
                        <th width="90px;">Photo</th>
	                  
    					<th>Judul</th>
                        
                        <th>Tanggal</th>
                       
                        
                        
                        <th>Aksi</th>
                        
                    </tr>
                </thead>
 <tbody>
			  <?php
			  
			  $sql="select * from tbl_berita  order by id_berita DESC";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){
			  ?>
              <tr>
                <td><div align="center"><?php echo $no; ?></div></td>
				<td><img width="75px;" height="75px;" src="../gambar/berita/<?php echo $data['gambar'];?>"/></td>
               
                
                <td><?php echo $data['judul']; ?></td>
                <td><?php echo tgl_indo($data['tanggal']); ?></td>
                
                
               
                <td><div align="center"><a href="home.php?page=berita&id_berita=<?php echo $data['id_berita']; ?>"><img src="../gambar/button-edit.gif" width="20" height="20" /></a>
				    <a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_berita.php?id_berita=<?php echo $data['id_berita']; ?>';}"><img src="../gambar/button-cross.gif" width="20" height="20" /></a></div></td>
              </tr>
             <?php $no++;}?>
            </table>
            <p align="center">&nbsp;</p>
            <p>&nbsp;</p>
          </td>
        </tr>
        </tbody>
      </table>
	  </div>