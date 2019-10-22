<div class="agileits_agile_about">
	<h3>Hasil Survey</h3>
	<div class="agileits_agile_about_mail">
        <div class="li_hasil">                          
            <li>
                <ul>
                    <?php
					$sql="SELECT * FROM tbl_kategori ORDER BY id_kat DESC";
					$query=mysql_query($sql);
					$no=1;
					while($data=mysql_fetch_array($query)){
						$id_kat=$data['id_kat'];
						$kategori=$data['kategori'];
						$count=mysql_num_rows(mysql_query("select * from tbl_pesan where id_kat=$id_kat group by tahun")); ?>
						<li>                                                  
						    <?php  echo $kategori;?>, <?php echo $count;?>
                        </li>
                            <?php 
                            $qikm="select * from tbl_pesan where id_kat=$id_kat group by tahun asc";
                            $qikm2=mysql_query($qikm);		
                            while($data_ikm=mysql_fetch_array($qikm2)){
                                $tahun_ikm=$data_ikm['tahun'];
							?>
							<ul>
                                                		<?php /*<li><a href="index.php?page=data_ikm_tahun&kat=<?php echo $id_kat;?>&tahun=<?php echo $tahun_ikm;?>">Tahun <?php echo $tahun_ikm;?> </a></li> */?>
                                                        
                                <li>Tahun <?php echo $tahun_ikm;?></li> 
                            </ul>    
                                <?php
								$tikm="select * from tbl_pesan where tahun = $tahun_ikm and id_kat=$id_kat group by tw asc";
								$tikm2=mysql_query($tikm);		
					 			while($tata_ikm=mysql_fetch_array($tikm2)){  ?>
                                
                            <ul class="tw">
                                <li><a href="index.php?page=data_ikm_tw&kat=<?php echo $id_kat;?>&tahun=<?php echo $tahun_ikm;?>&tw=<?php echo $tata_ikm['tw'];?>">Periode <?php echo $tata_ikm['tw'];?></a>
                                </li>
                            </ul>        
                                <?php } ?>                        															
							<?php } ?> 
                            <?php $no++; }?>
                </ul>
            </li>
        </div>                     
    </div>
</div>