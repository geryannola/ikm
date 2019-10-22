<?php
session_start(); //jalankan session

include('./inc/koneksi.php');
include('./inc/validation.php');

//login scripnya
//set notif 
$notif='';
// jika tombol submit di tekan

if (isset($_POST['login'])){
//includ clas untuk decode password yang di input oleh user untuk di samakan dengan colomn password yang ada di database

//ambil nilai dari post form 
$password=$_POST['password'];
$username=$_POST['username'];

//query untuk login, cek table login dimana email dan password yang ada di database sama dengan email dan password yang di submit dari form 
$query=mysql_query("select * from user WHERE username='$username'  AND  password='$password' LIMIT 1");
//cek query login

$cek=mysql_num_rows($query);
//jika lebih besar dari 0 atau ditemukan kecocokan di dalam database dan table login
if($cek >0){
//set row sebagai mysql_fetch_array dari query sql di atas
$row=mysql_fetch_array($query);

//ambil data dari table login

$_SESSION['id_s']=$row['id_s'];

$s_nama=$row['username'];
$_SESSION['username']=$s_nama;
$_SESSION['nama']=$row['nama'];
//set session level= level dari table login







echo "<script>alert('Anda Berhasil Login');window.location = 'index.php?page=kat_survey';</script>";
}else{
	
echo "<script>alert('Username Atau Password Tidak Sesuai');window.location = 'index.php?page=login';</script>";
}


	
}
/// jika dapat daftar

if (isset($_POST['daftar'])) {
$nik=$_POST['nik'];
$cek_nik=substr($nik,0,4);
echo $cek_nik;
$konstanta='7309';
if($cek_nik!=$konstanta){
	echo "<script>alert('Maaf NIK anda tidak terdaftar');window.location = 'index.php?page=daftar';</script>";
	exit;
}
$username=clstring($_POST['username']);
$password=clstring(123456);
$email=clstring($_POST['email']);
$nama=clstring($_POST['nama']);
$jk=clstring($_POST['jk']);
$umur=intval($_POST['umur']);

	$query_cek=mysql_query("select * from user where nik='$nik' ");
	$cek=mysql_num_rows($query_cek);		
	if($cek==1){
		echo "<script>alert('NIK ini Sudah ada');window.location = 'index.php?page=daftar';</script>";
		}else if($cek==0){
       
		  $SQLInsert="INSERT user (username,password,nama,email,umur,nik)			
		   VALUES('$username','$password','$nama','$email','$umur','$nik')";
		  $query = mysql_query($SQLInsert) or die(mysql_error());

		echo "<script>alert('Pendaftaran Berhasil Silahkan Melakukan Login');window.location = 'index.php?page=login';</script>";
	}

}
	
	
		


?>



