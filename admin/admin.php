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


?>
<?php
$text="Input Data Administartor ";

//include('./inc/class_decode.php');
//$kode_p = new Encryption_p();


if(isset($_POST['simpan'])){
	
$username=$_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];


//$password=$kode_p->encode_p($password);

	if(empty($username)){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Username belum diisi');
	}
	</script>";
}else{
$a="insert into tbl_admin(username,password,email)values('$username','$password','$email')";
$b=mysql_query($a);
	if($b){
	echo "<script type='text/javascript'>
	onload =function(){
	alert('Data Admin Berhasil Di Simpan ');
	}
	</script>";
	}else{
	echo "Data gagal disimpan";
	}
}
}

//Proses edit
//tampilkan data yang diedit

if(isset($_GET['id_admin'])){
$id_admin=$_GET['id_admin'];
$text="Edit Admininistrator ";

}else{
	$id_admin='';
}


	
$sql="select * from tbl_admin where id_admin='$id_admin'";
$query=mysql_query($sql);
$baris=mysql_fetch_array($query);



if(isset($_POST['edit'])){
	
$id_admin=$_POST['id_admin'];
$username=$_POST['username'];
$password=$_POST['password'];
$email = $_POST['email'];


//$password=$kode_p->encode_p($password);

$a="Update tbl_admin set username='$username', password='$password',email='$email' where id_admin='$id_admin'";
$b=mysql_query($a);
if($b){
echo "<script>alert('Data berhasil disimpan!');javascript:history.go(-2);</script>";

}else{
echo "Data gagal diubah";
}
}

?>

<div class="content_top">
    		<div class="heading">
            <h2><?php echo $text;?></h2>
    		</div>
    	</div>
        
        
        <div class="box1">
 
 
 

        <form action="home.php?page=admin" method="post">
          <div class="form_settings" style="margin-top:20px;">
          
           <?php if(empty($id_admin)){?>
            <p style="font-size:18px;"><span>Username</span><input class="contact" type="text" name="username" value="" /></p> 
            <p style="font-size:18px;"><span>Password</span><input class="contact" type="password" name="password" value="" /></p> 
            <p style="font-size:18px;"><span>Email</span><input class="contact" type="email" name="email" value="" /></p> 
            
                    
                      
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit"  type="submit" name="simpan" 
            value="Simpan" /> </p>
            <?php } else{ ?>
            <input type="hidden" name="id_admin" value="<?php echo $baris['id_admin'];?>"/>
            <p style="font-size:18px; "><span>Username</span><input class="contact" type="text" name="username" value="<?php echo $baris['username'];?>" /></p> 
            <p style="font-size:18px; "><span>Password</span><input class="contact" type="password" name="password" value="<?php echo $baris['password'];?>" /></p> 
            <p style="font-size:18px; "><span>Password</span><input class="contact" type="email" name="email" value="<?php echo $baris['email'];?>" /></p> 
            
                      
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit"  type="submit" name="edit" 
            value="Edit" /> </p>
            
            <?php } ?>
          </div>
        </form>
        
        
      
        
        </div>
        
 <div class="content_top">
    		<div class="heading">
            <h2>Data Admin</h2>
    		</div>
    	</div>
       
        
      <table id="datatables" class="display">
       <thead>
                    <tr>
                    
                    	<th>NO</th>	
                        <th>Username</th>
                         <th>Password</th>
						<th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
 <tbody>

              
			  <?php
			  $sql="SELECT * FROM tbl_admin ORDER BY id_admin DESC";
			  $query=mysql_query($sql);
			  $no=1;
			  while($data=mysql_fetch_array($query)){
                           $id_admin=$data['id_admin'];
			  ?>
              <tr>
              <td><?php echo $no;?></td>
                <td><?php echo $data['username']; ?></td>
                <td><?php echo $data['password']; ?></td>
                <td><?php echo $data['email']; ?></td>
                <td><div align="center"><a href="home.php?page=admin&id_admin=<?php echo $data['id_admin']; ?>"><img src="../gambar/button-edit.gif" width="20" height="20" /></a>
				    <a href="javascript:if(confirm('Anda yakin akan menghapus data ini??')){document.location='hapus_admin.php?id_admin=<?php echo $data['id_admin']; ?>';}"><img src="../gambar/button-cross.gif" width="20" height="20" /></a></div></td>
              </tr>
             <?php $no++;}?>
           
       </tbody>
       
      </table>
	  