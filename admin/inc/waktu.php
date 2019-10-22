<?php
function formatrp($angka){
$rupiah=number_format($angka,2,',','.');
return $rupiah;
}
function kata($kata){
$text=substr($kata,0,269);
return $text;
}

//potong kata
function kata_ok($kalimat,$jum_kata)
{
$spasi=0;
$kalimat_ok='';
$count_kalimat=explode(' ',$kalimat);
$ck=count($count_kalimat);
$ag=20;
/*for($i=0;$i<strlen($kalimat);$i++)
	{
		if($kalimat[$i]=='')
		$spasi++;
		$kalimat_ok.=$kalimat[$i];
		if($spasi==$jum_kata)
		break;
	} */
	for($i=0;$i<$ag;$i++){
		$kalimat_ok = $count_kalimat[$i];
		return $kalimat_ok;

	}
	//return $count_kalimat[$i];
	//return $ck;
}


function getTime($timeSpent, $date)
{
	$days = floor($timeSpent / (60 * 60 * 24));
	$remainder = $timeSpent % (60 * 60 * 24);
	$hours = floor($remainder / (60 * 60));
	$remainder = $remainder % (60 * 60);
	$minutes = floor($remainder / 60);
	$seconds = $remainder % 60;
	
	if($days > 0)
		$time = date('F d Y', $date);
	elseif($days == 0 && $hours == 0 && $minutes == 0)
		$time = "beberapa detik yang lalu";		
	elseif($days == 0 && $hours == 0)
		$time = $minutes.' menit yang lalu';
	else
		$time = $hours." jam yang lalu";
		
	return $time;
}

function waktu($date)
{
if(empty($date)) {
return "Tanggal Tidak Tersedia";
}
 
$periods = array("detik", "menit", "jam", "hari", "minggu", "bulan", "tahun", "dekade");
$lengths = array("60","60","24","7","4.35","12","10");
 
$now = time();
$unix_date = strtotime($date);
 
if(empty($unix_date)) {
return "tanggal tidak valid";
}
 
if($now > $unix_date) {
$difference = $now - $unix_date;
$tense = "yang lalu";
 
} else {
$difference = $unix_date - $now;
$tense = "now";
}
 
for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
$difference /= $lengths[$j];
}
 
$difference = round($difference);
 
if($difference != 1) {
$periods[$j].= "";
}
 
return "$difference $periods[$j] {$tense}";
}


function tgl_indo($tgl){
			$tanggal = substr($tgl,8,2);
			$bulan = getBulan(substr($tgl,5,2));
			$tahun = substr($tgl,0,4);
			return $tanggal.' '.$bulan.' '.$tahun;		 
	}	

	function getBulan($bln){
				switch ($bln){
					case 1: 
						return "Januari";
						break;
					case 2:
						return "Februari";
						break;
					case 3:
						return "Maret";
						break;
					case 4:
						return "April";
						break;
					case 5:
						return "Mei";
						break;
					case 6:
						return "Juni";
						break;
					case 7:
						return "Juli";
						break;
					case 8:
						return "Agustus";
						break;
					case 9:
						return "September";
						break;
					case 10:
						return "Oktober";
						break;
					case 11:
						return "November";
						break;
					case 12:
						return "Desember";
						break;
				}
			} 
			function HariIni($hari){
				//$hariIn=date("w");
				switch ($hari){
					case 0: 
						return "Minggu";
						break;
					case 1:
						return "Senin";
						break;
					case 2:
						return "Selasa";
						break;
					case 3:
						return "Rabu";
						break;
					case 4:
						return "Kamis";
						break;
					case 5:
						return "Jumat";
						break;
					case 6:
						return "Sabtu";
						break;
					case 7:
						return "Minggu";
						break;
					
				}
			} 
?>
