<!DOCTYPE HTML>
<html>

<head>
  <title>Login Administrator Survey Pelayanan Publik</title>
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
<style>
.notif{
	padding:5px;
	border: solid #CCC;
	text-align:center;
	display:inline-block;
	min-width:95%;
}

</style>
</head>

<body>


 
       <div id="main">
<div id="footer" style="background-color:#0CF; font-size:36px; font-weight:bold; text-transform:uppercase;">
      <p>Login Administrator </p>
    </div>
    <p>&nbsp;</p>
  </div>
  
     
    

    <div id="site_content">
<?php //include('../inc/check.php');?>
<?php if(isset($_GET['notif'])){ ?> <div align="center" class="notif"> Username atau Password yang and masukan salah </div> <?php } ?> 
      <div id="content">
      
<div class="box_login">
        <form action="loginproses.php" method="post">
          <div class="form_settings" style="margin-left:170px;">
            <p><span>Username</span><input class="contact" type="text" name="username" value="" /></p>
            <p><span>Password</span><input class="contact" type="password" name="password" value="" /></p>
           
            <p style="padding-top: 15px"><span>&nbsp;</span><input class="submit" name="login" type="submit" name="login" 
            value="Masuk" /></p>
          </div>
        </form>
        
    </div>



      </div>
    </div>
    <div style="margin-top:50px;" id="footer">

    <p></p>
    </div>
    <p>&nbsp;</p>
  </div>
</body>
</html>
