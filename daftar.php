<div class="agileits_agile_about">
	<h3>Registrasi Akun</h3>
	<div class="agileits_agile_about_mail">
		<form action="loginproses.php" method="post">
		<div class="col-md-6 agileits_agile_about_mail_left">
			<input type="text" name="nik" placeholder="NIK" required>
        	<input type="text" name="nama" placeholder="Nama" required>
        <div style="margin-top:10px;"></div>
        	<input type="text" name="username" placeholder="Username" required>									
       	<div style="margin-top:10px;"></div>
			<input type="email" name="email" placeholder="Email" required>
           
        <div style="margin-top:10px;"> Jenis Kelamin</div>
        	<select name="jk">
            	<option value="l">Laki-Laki</option>
            	<option value="p">Perempuan</option>
            </select> 
        <div style="margin-top:10px;"> Umur </div>
        	<select name="umur">
            	<option value="1">Kurang 20 Tahun</option>
                <option value="2">20 s.d 30 Tahun</option>
                <option value="3">31 s.d 40 Tahun</option>
                <option value="4">41 s.d 50 Tahun</option>
                <option value="5">Lebih 50 Tahun</option>
			</select>   
        </div>
		<div class="clearfix"> </div>
		<div style="margin-top:10px;"></div>
			<input type="submit" name="daftar" value="Submit">
		</form>
	</div>
</div>