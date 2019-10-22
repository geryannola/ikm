<?php
session_start();

include "./inc/koneksi.php";

if  (isset($_SESSION['username']))
{
   if  (isset($_SESSION['username']))
   {
   
if (isset($_GET["id_berita"])) {
	$id_produk = $_GET["id_berita"];
} else {
	die ("Error. Id Berita belum dipilih! ");	
}

if (!empty($id_produk)) {
$SQL = "delete from tbl_berita where id_berita='$id_produk'"; 
 if(! mysql_query($SQL)) 
  { 
    echo "Data tidak terhapus!<br>\n"; 
   } 
    header("location:home.php?page=berita");
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
