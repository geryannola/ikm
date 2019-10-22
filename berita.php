<div class="agileits_agile_about">
	<h3>Berita</h3>
    <?php
		$query="select * from tbl_berita order by id_berita desc ";
		$result = mysql_query($query);	
			while ($view1=mysql_fetch_array($result))
			{		
	?>
     <div class="agileits_agile_about_blog">
		<div class="col-md-6 agileits_agile_about_blog_left">
			<div class="agile_about_blog_left_grid">
				<a href="#" data-toggle="modal" data-target="#myModal"><img src="./gambar/berita/<?php echo $view1['gambar'];?>" alt=" " class="img-responsive" /></a>
				<div class="agile_about_blog_left_grid_pos">
					<ul>
						<li>20</li>
						<li><?php echo tgl_indo($view1['tanggal']);?></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-6 agileits_agile_about_blog_right">
			<div class="agile_about_blog_right_grid">
				<div class="agile_model">
					<a href="#" data-toggle="modal" data-target="#myModal">
										<?php echo $view1['judul'];?></a>
				</div>
				<div class="agile_about_blog_right_grid_list">
					<ul>
						<li><span class="glyphicon glyphicon-user" aria-hidden="true"></span><a href="#">Admin</a>
						</li>
					</ul>
				</div>
				<?php echo $view1['isi'];?>
			</div>
		</div>
		<div class="clearfix"> </div>
		</div>
                                        
   <?php } ?>
	</div>
