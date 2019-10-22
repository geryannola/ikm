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
<div class="content_top">
  <div class="heading">
  <h2>KRITIK DAN SARAN </h2>
  </div>
</div>
<div class="box2">                                   
  <table id="datatables" class="display">
  <thead>
    <tr>
      <th width="50px;">No</th>
      <th width="120px;">Tanggal</th>
      <th>Nama</th>
      <th width="90px;">No HP</th>
      <th width="15px;">Email</th>
      <th>Isi</th>
      <th>Aksi</th>
    </tr>
   </thead>
   <tbody>
	 <?php
	 $sql="select * from tbl_saran  order by id_saran DESC";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){
			  ?>
      <tr>
        <td><div align="center"><?php echo $no; ?></div></td>
				<td><?php echo tgl_indo($data['tgl']); ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['nohp']; ?></td>
        <td><?php echo $data['email']; ?></td>
        <td><?php echo $data['saran']; ?></td>
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