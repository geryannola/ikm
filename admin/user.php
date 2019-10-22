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
<?php

include "../include/fungsi_seo.php";

?>

<div class="content_top">
    		<div class="heading">
            <h2>KELOLAH MEMBER ATAU USER E-Commmerce Rumah Cantik</h2>
    		</div>
    	</div>
      <table id="datatables" class="display">
       <thead>
                    <tr>
                        <th>Nama</th>
						<th>Email</th>
                        <th>Tgl Join</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
 <tbody>

              
			  <?php
			  $sql="SELECT * FROM tbl_user ORDER BY id DESC";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){
                           $id_user=$data['id'];
			  ?>
              <tr>
                <td><div align="center"><?php echo $data['nama']; ?></div></td>
                <td><?php echo $data['email']; ?></td>
                <td><?php echo  $tanggal=tgl_indo($data['tanggal']); ?></td>
                <td><?php echo $data['telpon']; ?></td>
				 <td><?php echo $data['alamat']; ?></td>
                <td><div align="center"><a href="home.php?page=akun&id_user=<?php echo $data['id']; ?>"><img src="../gambar/button-edit.gif" width="20" height="20" /></a>
				    <a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_user.php?id_user=<?php echo $data['id']; ?>';}"><img src="../gambar/button-cross.gif" width="20" height="20" /></a></div></td>
              </tr>
             <?php $no++;}?>
           
       </tbody>
       
      </table>
	  