<?php
//fungsi sanitize string sebelum di masukan ke database msql stie_bas
function clString($string){
$string_1=filter_var($string, FILTER_SANITIZE_STRING);  
$string_ok=mysql_real_escape_string($string_1);
			  
			  return $string_ok;
}	
// fumgsi untuk navigasi side menu
function s_menu($id){
if(isset($_GET['page'])){
		   $page=$_GET['page'];
		   }else{
		   $page='';
		   }
		   if ($id==$page){
		   $cl_menu="menu-item-divided pure-menu-selected";
		   }else{
		   $cl_menu='';
		   }		   
           return $cl_menu;

}

function p_menu($id){
if(isset($_GET['page'])){
		   $page=$_GET['page'];
		   }else{
		   $page='';
		   }
		   if ($id==$page){
		   $cl_menu="aktif";
		   
		   }else{
		   $cl_menu='li_act';
		   }		   
           
		   return $cl_menu;

}
function menu($id){
if(isset($_GET['page'])){
		   $page=$_GET['page'];
		   }else{
		   $page='';
		   }
		   if ($id==$page){
		   $cl_menu="active";
		   }else{
		   $cl_menu='';
		   }		   
           return $cl_menu;

}

//cari

function cari($q){
	
	switch ($q){
	

	case "data_admin";
		$cari="home.php?page=data_admin";
		break;

	case "data_admin_masjid";
		$cari="home.php?page=data_admin_masjid";
		break;
		
		case "data_masjid";
		$cari="home.php?page=data_masjid";
		break;
		
		case "data_kegiatan";
		$cari="home.php?page=data_kegiatan";
		break;
		
		case "data_berita":
		$cari="home.php?page=data_berita";
		break;
		
		case "data_petugas":
		$cari="home.php?page=data_petugas";
		break;

		case "data_remaja":
		$cari="home.php?page=data_remaja";
		break;


		
	default:
	$cari="home.php?page=data_masjid";
	break;
			
		
	}
	return $cari;
	
	
}

//

function cariTC($q){
	
	switch ($q){
	

	case "data_admin";
		$tc="cari admin ";
		break;

	case "data_admin_masjid";
		$tc="cari admin masjid";
		break;
		
		case "data_masjid";
		$tc="cari masjid";
		break;
		
		case "data_kegiatan";
		$tc="cari kegiatan";
		break;
		
		case "data_berita":
		$tc="cari berita";
		break;
		
		case "data_petugas":
		$tc="cari petugas";
		break;

		case "data_remaja":
		$tc="cari remaja";
		break;


		
	default:
	$tc="cari masjid";
	break;
			
		
	}
	return $tc;
	
	
}

function artikel($oldstring, $wordsreturned)
{
  $retval = $oldstring;
  $string = preg_replace('/(?<=\S,)(?=\S)/', ' ', $oldstring);
  $string = str_replace("\n", " ", $string);
  $array = explode(" ", $string);
  if (count($array)<=$wordsreturned)
  {
    $retval = $string;
  }
  else
  {
    array_splice($array, $wordsreturned);
    $retval = implode(" ", $array)." ...";
  }
  return $retval;
}
?>

