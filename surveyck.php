<?php
session_start();
error_reporting(0);// With this no error reporting will be there
require "config.php";
require "tw.php";

$qst_id=$_POST['qst_id'];
$opt=$_POST['opt']; // User choice
$id_s=$_POST['id_s'];
$id_kat=$_POST['id_kat'];

$tahun=date('Y');


//$opt='option3';

if(!is_numeric($qst_id)){
echo "Data Error";
exit; }


/*
$cek1=$dbo->prepare("select * from matrix where id_kat='$id_kat' and id_s='$id_s' and id_p='$qst_id'");
$cek1->execute();
$cek= $count1->fetch(PDO::FETCH_OBJ);
	
if($cek==1){

}
*/

$sql=$dbo->prepare("insert into matrix(id_m,id_kat,id_s,id_p,nilai,tahun,tw) values('','$id_kat','$id_s','$qst_id','$opt','$tahun','$tw')");
//$sql->bindParam(':nilai',$opt,PDO::PARAM_STR, 50);
$sql->execute();

	
/*

*/

/*
//// Qestions are collected from CSV file /////////
$next='F'; // Flag is set to display thank you message
$csv = array_map('str_getcsv', file('poll_qst.csv'));
if(count($csv) > $qst_id){
$next='T';
//print_r($csv[$qst_id]); // working fine
$row=$csv[$qst_id];
//print_r($row); // working fine 
$qst_id=$qst_id+1;
$main= array("data"=>array("q1"=>"$row[1]","opt1"=>"$row[2]","opt2"=>"$row[3]","opt3"=>"$row[4]","opt4"=>"$row[5]","qst_id"=>"$qst_id"),"next"=>"$next");
}else{
$main= array("next"=>"$next");
}

///// end of qustions from CSV file ///////
*/

//////// Collected from databse ///////
$qst_id2=$qst_id+1;
/*
$no_questions = $dbo->query("select count(id_p) from tbl_pertanyaan where id_kat=$id_kat")->fetchColumn();
*/

$count1=$dbo->prepare("select * from tbl_pertanyaan where id_kat=$id_kat order by id_p DESC LIMIT 1");
$count1->execute();
$row1 = $count1->fetch(PDO::FETCH_OBJ);
$no_questions=$row1->id_p;
$no_questions=$no_questions;



if($qst_id2 > $no_questions){
$next='F'; // Flag is set to display thank you message
}else{
$next='T'; // Flag is set to display next question

$count=$dbo->prepare("select * from tbl_pertanyaan where id_p > $qst_id and id_kat=$id_kat order by id_p ASC LIMIT 1");
if($count->execute()){
$row = $count->fetch(PDO::FETCH_OBJ);
}
}
$main= array("data"=>array("q1"=>"$row->pertanyaan","opt1"=>"Sangat Puas","opt2"=>"Puas","opt3"=>"Cukup Puas","opt4"=>"Tidak Puas","qst_id"=>"$row->id_p"),"next"=>"$next");
// end of collection from database //////


echo json_encode($main);

////////////

?>