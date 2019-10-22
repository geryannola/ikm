<?php
session_start();
$id_s=$_SESSION['id_s'];
include("./inc/koneksi.php");

if (isset($_POST['pesan'])) {
	$pesan_txt=$_POST['pesan_txt'];
	$kat_id=$_POST['kat_id'];
	include('./tw.php');
	$SQLInsert="INSERT tbl_pesan (id_s,pesan,id_kat,tw, tahun)			
		VALUES('$id_s','$pesan_txt','$kat_id','$tw','$tahun')";
	$query = mysql_query($SQLInsert) or die(mysql_error());
	echo "<script>alert('Terimaksih Telah Mengisi Quesioner Survey Kepuasan Maysrakat');window.location = 'index.php';</script>";
}
if (isset($_POST['saran'])) {
	$saran_txt=$_POST['saran_txt'];
	$nama=$_POST['nama'];
	$nohp=$_POST['nohp'];
	$email=$_POST['email'];
	$tgl=date("Y-m-d");
	$SQLInsert="INSERT tbl_saran (nama,nohp,email,saran,tgl)			
		VALUES('$nama','$nohp','$email','$saran_txt','$tgl')";
	$query = mysql_query($SQLInsert) or die(mysql_error());
	echo "<script>alert('Terimaksih Telah Mengisi Kotak Saran Survey Kepuasan Maysrakat');window.location = 'index.php';</script>";
	}
?>
