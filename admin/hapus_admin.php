<?php
session_start();

include "./inc/koneksi.php";

if  (isset($_SESSION['username']))
{
   if  (isset($_SESSION['username']))
   {
   
if (isset($_GET["id_admin"])) {
	$id_admin = $_GET["id_admin"];
} else {
	die ("Error. Id Admin belum dipilih! ");	
}

if (!empty($id_admin)) {
$SQL = "delete from tbl_admin where id_admin='$id_admin'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:home.php?page=admin");
}
}
   else
   {
       // jika levelnya bukan admin, tampilkan pesan
       echo "<script>alert('maaf And Bukan Admin');javascript:history.go(-2);</script>";
   }
}
else
{
    echo "<script>alert('Silahkan Login!!');javascript:history.go(-2);</script>";
}
?>
