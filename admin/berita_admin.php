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

 <script type="text/JavaScript">

function getComboA(sel) {
    var value = sel.value;  
	var nama = sel.name;

var dataString = 'headline='+ value + '&id='+ nama
	 
  $.ajax({
  type: "POST",
  url: "proseshead.php",
  data: dataString,
  cache: false,
  
  success: function(html){
  window.location.href = "home.php?page=berita_admin";
  }
  });
}

	//-->
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
if(isset($_SESSION['id_admin'])){
?>
            <div style="margin-top:20px;"></div>
            
            <div class="content_top">
    		<div class="heading">
            <h2>SEMUA DATA BERITA LINGGAU POS </h2>
    		</div>
    	</div>
            <div class="box2">
            
            
            
             <table id="datatables" class="display">
              <thead>
                    <tr>
                       <th width="50px;">No</th>
	                   <th width="90">Photo</th>
	                   
                       <th>Kanal</th>
     
    					<th>Judul</th>
                        
                        <th>Tanggal</th>
                       
                        
                        <th>HITS</th>
                         <th style="text-align:center;">Headline</th>
                        <th style="text-align:center;">Aksi</th>
                       
                        
                    </tr>
                </thead>
 <tbody>
			  <?php
			  $sql="select * from tbl_berita a , tbl_kanal b where b.id_kanal=a.id_kanal order by a.id_berita DESC";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){
			  ?>
              <tr>
                <td><div align="center"><?php echo $no; ?></div></td>
                <td><img width="75px;" height="75px;" src="../gambar/berita/<?php echo $data['gambar'];?>"/></td>
                <td><?php echo $data['nama_kanal']; ?></td>
                
                <td><a href="" target="_blank"><?php echo $data['judul']; ?></a></td>
                <td><?php echo tgl_indo($data['tanggal']); ?></td>
                
                
                <td><?php echo $data['hits']; ?> kali</td>
                 <td align="center" style="text-align:center;"> 
                 <select onchange="getComboA(this)" id="comboA"  name="<?php echo $data['id_berita'];?>">
                 <option value="no" <?php if($data['headline']=='no') {echo 'selected';}?>>No </option>
                 <option value="yes" <?php if($data['headline']=='yes') { echo 'selected';}?>>Yes</option>
                 </select>
                 </td>   
                <td><div align="center">
				    <a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_berita_admin.php?id_berita=<?php echo $data['id_berita']; ?>';}"><img src="../gambar/button-cross.gif" width="20" height="20" /></a></div></td>
                
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
      
  <?php }?>    