<?php

session_start(); //jalankan session
include('./inc/koneksi.php');
//include('./inc/check.php');


require_once("./dompdf/dompdf_config.inc.php");
$tw=$_GET['tw'];
$kat=intval($_GET['kat']);
$tahun=intval($_GET['tahun']);





$h="http://localhost/pdf_data_ikm_tw.php?&kat=".$kat."&tahun=".$tahun."&tw=".$tw."";
//$h="http://localhost/toko_trian/test_cetak.php";

$html=file_get_contents($h);

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper("f4", "landscape");
$dompdf->render();

/*$dompdf->stream('data_nilai_seleksi-'.$no.'-'.$nama.'.pdf',array('Attachment'=>$test));
*/
$dompdf->stream('cetak_data'.$tw.'.pdf',array('Attachment'=>0));



?> 