<?php
session_start();

include "./inc/koneksi.php";

if  (isset($_SESSION['username']))
{
   if  (isset($_SESSION['username']))
   {
   
if (isset($_GET['id_pertanyaan'])) {
	$id_orders = $_GET["id_pertanyaan"];
} else {
	die ("Error. Id Order belum dipilih! ");	
}

if (!empty($id_orders)) {
$SQL_3 = "delete from tbl_pertanyaan where id_p='$id_orders'"; 

 if(! mysql_query($SQL_3)) 
  { 
  
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:home.php?page=sub_survey");
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
