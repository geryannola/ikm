<?php
$tahun = date('Y');
$tanggal = date('m-d-Y');

$atw1 = date("m-d-Y", mktime(0, 0, 0, 1, 1, $tahun));
$btw1 = date("m-d-Y", mktime(0, 0, 0, 6, 30, $tahun));

$atw2 = date("m-d-Y", mktime(0, 0, 0, 7, 1, $tahun));
$btw2 = date("m-d-Y", mktime(0, 0, 0, 12, 31, $tahun));

if ($tanggal >= $atw1 and $tanggal <= $btw1) {
	$tw = 'Semester Ke 1';
	$twx = 'sm1';
} else if ($tanggal >= $atw2 and $tanggal <= $btw2) {
	$tw = 'Semester Ke 2';
	$twx = 'sm2';
}
// $atw1=date("m-d-Y", mktime(0, 0, 0, 1, 1, $tahun));
// $btw1=date("m-d-Y", mktime(0, 0, 0, 3, 31, $tahun));

// $atw2=date("m-d-Y", mktime(0, 0, 0, 4, 1, $tahun));
// $btw2=date("m-d-Y", mktime(0, 0, 0, 6, 30, $tahun));

// $atw3=date("m-d-Y", mktime(0, 0, 0, 7, 1, $tahun));
// $btw3=date("m-d-Y", mktime(0, 0, 0, 9, 30, $tahun));

// $atw4=date("m-d-Y", mktime(0, 0, 0, 10, 1, $tahun));
// $btw4=date("m-d-Y", mktime(0, 0, 0, 12, 31, $tahun));




// if($tanggal >= $atw1 and $tanggal <=$btw1){
// 	$tw='Triwulan Ke 1';
// 	$twx='tw1';
// }else if($tanggal >= $atw2 and $tanggal <=$btw2){
// 	$tw='Triwulan Ke 2';
// 	$twx='tw2';

// }else if($tanggal >= $atw3 and $tanggal <=$btw3){
// 	$tw='Triwulan Ke 3';
// 	$twx='tw3';

// }else if($tanggal >= $atw4 and $tanggal <=$btw4){
// 	$tw='Triwulan Ke 4';
// 	$twx='tw4';

// }

function ntxt($q)
{
	switch ($q) {


		case "1";
			$ntxt = "Sangat Tidak Puas";
			break;
		case "2";
			$ntxt = "Tidak Puas";
			break;
		case "3";
			$ntxt = "Cukup Puas";
			break;
		case "4";
			$ntxt = "Puas";
			break;
		case "5";
			$ntxt = "Sangat Puas";
			break;
	}
	return $ntxt;
}
