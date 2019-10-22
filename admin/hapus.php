<?php
session_start();

include "./inc/koneksi.php";

if  (isset($_SESSION['username']))
{
   if  (isset($_SESSION['username']))
   {
   
	if (isset($_GET["id"])) {
			$id= $_GET["id"];
		} else {
	die ("Error. Id Admin belum dipilih! ");	
}

if (!empty($id)) {
$SQL = "delete from responden where id_s='$id'"; 
 if(! mysql_query($SQL)) 
   { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
   
   $SQL2 = "delete from matrix where id_s='$id'"; 
   $a=mysql_query($SQL2);
   echo "<script>alert('Data Berhasil di Hapus dari Database!'); window.location.assign('home.php');</script>";
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
