<?php
session_start();

include "./inc/koneksi.php";

if  (isset($_SESSION['username']))
{
   if  (isset($_SESSION['username']))
   {
   
if (isset($_GET["id_kontak"])) {
	$id_buku = $_GET["id_kontak"];
} else {
	die ("Error. Id Kontak belum dipilih! ");	
}

if (!empty($id_buku)) {
$SQL = "delete from tbl_kontak where id_kontak='$id_buku'"; 

 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:home.php?page=kontak");
}
}
   else
   {
       // jika levelnya bukan admin, tampilkan pesan
       echo "<script>alert('maaf Anda Bukan Admin');javascript:history.go(-2);</script>";
   }
}
else
{
    echo "<script>alert('Silahkan Login!!');javascript:history.go(-2);</script>";
}
?>
