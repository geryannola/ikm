<?php
//session_start();
$my['host']	="localhost";
$my['user']	="root";
$my['pass']	= "";
$my['dbs']	= "ikm";

define("_ABSOLUTE_PATH", "/admin/");


$koneksi	= mysql_connect($my['host'], 
							$my['user'], 
							$my['pass']);
if (! $koneksi) {
  echo "Koneksi Gagal";
  mysql_error();
}
mysql_select_db($my['dbs'])
	 or die ("Database tidak bisa di akses".mysql_error());

?>