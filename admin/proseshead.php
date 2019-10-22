<?php
session_start();
if(isset($_POST['headline']))
{
include('./inc/koneksi.php');

$id=$_POST['id'];
$headline=$_POST['headline'];

$SQLInsert=("update tbl_berita set headline='$headline' where id_berita='$id'");

		  $query = mysql_query($SQLInsert) or die(mysql_error());
		  



 }

?>

