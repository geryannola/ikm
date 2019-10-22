<?php session_start();
//include koneksi ke database
include('./inc/koneksi.php');



session_destroy();


header("location:index.php");
?>
