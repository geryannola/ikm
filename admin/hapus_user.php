<?php
session_start();

include "../include/koneksi.php";

if  (isset($_SESSION['username']))
{
   if  (isset($_SESSION['username']))
   {
   
if (isset($_GET['id_user'])) {
	$id_user = $_GET["id_user"];
} else {
	die ("Error. Id Order belum dipilih! ");	
}

if (!empty($id_user)) {
$SQL = "delete from tbl_user where id='$id_user'"; 

 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:home.php?page=user");
}
}
   else
   {
       // jika levelnya bukan admin, tampilkan pesan
       echo "<script>alert('Anda bukan admin');javascript:history.go(-1);</script>";
   }
}
else
{
   echo "<script>alert('Login dulu dong!!');javascript:history.go(-1);</script>";
}
?>
