
<script>
   $(document).ready(function() {
$('#main').hide();	
$("input:radio[name=options]").click(function() {
$('#maindiv').hide('slide', {direction: 'left'}, 100);
$.post( "surveyck.php", {"opt":$(this).val(),"qst_id":$("#qst_id").val(),"id_kat":$("#id_kat").val(),"id_s":$("#id_s").val()},function(return_data,status){

if(return_data.next=='T'){
$('#q1').html(return_data.data.q1);

$('label[for=opt1]').html(return_data.data.opt1);
$('label[for=opt2]').html(return_data.data.opt2);
$('label[for=opt3]').html(return_data.data.opt3);
$('label[for=opt4]').html(return_data.data.opt4);

$("#qst_id").val(return_data.data.qst_id);

}
else{$('#maindiv').html("");
 $('#main').show();
}

},"json"); 
$("#f1")[0].reset();
 $('#maindiv').show('slide', {direction: 'right'}, 1000);

     });


   });
</script>
<div id="maindiv" class="maindiv">
<div class="agileits_agile_about">
										<h3>Data Pertanyaan</h3>
										<div class="agileits_agile_about_mail">
<?php

$id_kat=intval($_GET['id_kat']);
$id_s=$_SESSION['id_s'];
$sql="select * from tbl_pertanyaan where id_kat=$id_kat order by id_kat LIMIT 1";
$query=mysql_query($sql);
$row=mysql_fetch_array($query);
/*
$sql1="select * from tbl_pertanyaan where id_kat=$id_kat order by id_p DESC ";
$query1=mysql_query($sql1);
$row1=mysql_fetch_array($query1);
$no_qestions=$row1['id_p'];
*/

echo "

<form id='f1'>
<table>
<tr><td>
<h id='q1'>$row[pertanyaan]</h></td></tr>
<tr><td>
<input type='hidden'  id=qst_id value=$row[id_p]>
<input type='hidden' id=id_kat value=$id_kat>
<input type='hidden' id=id_s value=$id_s>


<tr><td>
      <input type='radio' name='options' id='opt1' value='4' > <label for='opt1' class='lb'>Sangat Puas</label>
</td></tr>
<tr><td>
      <input type='radio' name='options' id='opt2' value='3' >  <label for='opt2' class='lb'>Puas</label>
</td></tr>

<tr><td>
      <input type='radio' name='options' id='opt3' value='2' >  <label for='opt3' class='lb'>Cukup Puas</label>
</td></tr>
<tr><td>
      <input type='radio' name='options' id='opt4' value='1' >  <label for='opt4' class='lb'>Tidak Puas</label>
</td></tr>
<tr><td>
      
</td></tr>

</table>
</form>
</div>
"; ?>

</div>
</div>
<div id="main">
<div class="agileits_agile_about">
										<h3>Pesan</h3>
										<div class="agileits_agile_about_mail">
											<form action="post.php" method="post">
												
												<div class="clearfix"> </div>
                                                <input type="hidden" name="kat_id" value="<?php echo $id_kat;?>"/>
												<textarea name="pesan_txt" placeholder="Message..." required></textarea>
												<input type="submit" name="pesan" value="Submit">
											</form>
										</div>
									</div>
</div>

