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
$query=mysql_query("select * from tbl_admin WHERE (username='$username'  AND password='$password')");
//cek query login

$cek=mysql_num_rows($query);
//jika lebih besar dari 0 atau ditemukan kecocokan di dalam database dan table login
if($cek >0){
//set row sebagai mysql_fetch_array dari query sql di atas
$row=mysql_fetch_array($query);

//ambil data dari table login
$id=$row['id_admin'];
$_SESSION['id_admin']=$id;

$s_nama=$row['username'];
$_SESSION['username']=$s_nama;

//set session level= level dari table login




//set session login = tru
$_SESSION['isLoggedIn'] = true;
$_SESSION['id_s'] = true;

$_SESSION['login'] = true;



header('Location:home.php');
}else{
	
header ('Location:index.php?&notif=a');

}


	
}
/// jika dapat daftar

if (isset($_POST['daftar'])) {
include('./inc/class_decode.php');
$username=clstring($_POST['username']);
$password=clstring($_POST['password']);
$kode_p = new Encryption_p();
$pass=$kode_p->encode_p($password);

	$query_cek=mysql_query("select * from tbl_admin where username='$username' ");
	$cek=mysql_num_rows($query_cek);
	
	if($cek==1){
		$a="<span class='notify'>Username User telah ada</span>";
		}else if($cek==0){
       
		  $SQLInsert="INSERT tbl_admin (username,password)			
		   VALUES('$username','$pass')";
		  $query = mysql_query($SQLInsert) or die(mysql_error());

	  	$a="<span class='notify'>Anda Berhasil Mendaftar Silakahkan Login</notify>";
	}
	
	
		
}


?>



