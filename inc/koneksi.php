<?php
//session_start();
$my['host']	="localhost";
$my['user']	="root";
$my['pass']	= "";
$my['dbs']	= "ikm";

define("_ABSOLUTE_PATH", "./");

error_reporting(E_ALL ^ E_DEPRECATED);
$koneksi	= mysql_connect($my['host'], 
							$my['user'], 
							$my['pass']);

if (! $koneksi) {
  echo "Koneksi Gagal";
  mysqli_error();
}
mysql_select_db($my['dbs'])
	 or die ("Database tidak bisa di akses".mysql_error());

?>