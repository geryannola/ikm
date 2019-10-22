	<li><a href="home.php?page=data_ikm">Data IKM </a>
            		<ul>
                    <?php $qikm="select * from responden group by tahun asc";
								$qikm2=mysql_query($qikm);		
					 			while($data_ikm=mysql_fetch_array($qikm2)){
				    			$tahun_ikm=$data_ikm['tahun'];
						?>
                    	<li><a href="home.php?page=data_ikm_tahun&tahun=<?php echo $tahun_ikm;?>"> Tahun <?php echo $tahun_ikm;?> </a>
                        <ul>
                        <?php $tikm="select * from responden where tahun = $tahun_ikm group by tw asc";
								$tikm2=mysql_query($tikm);		
					 			while($tata_ikm=mysql_fetch_array($tikm2)){ ?>
  <li><a href="home.php?page=data_ikm_tw&tahun=<?php echo $tahun_ikm;?>&tw=<?php echo $tata_ikm['tw'];?>">  <?php echo $tahun_ikm;?> <?php echo $tata_ikm['tw'];?> </a></li>
                        
                        <?php } ?>
                        </li>
                        </ul>
                        <?php } ?>
                    
                    </ul>    
            </li>  
 		</ul>
    </li>
    <li><a href="home.php?page=kanal">Responden</a>
    <ul>
                    <?php $qikm="select * from responden group by tahun asc";
								$qikm2=mysql_query($qikm);		
					 			while($data_ikm=mysql_fetch_array($qikm2)){
				    			$tahun_ikm=$data_ikm['tahun'];
						?>
                    	<li><a href="home.php?page=data_responden_tahun&tahun=<?php echo $tahun_ikm;?>"> Tahun <?php echo $tahun_ikm;?> </a>
                        <ul>
                        <?php $tikm="select * from responden where tahun = $tahun_ikm group by tw asc";
								$tikm2=mysql_query($tikm);		
					 			while($tata_ikm=mysql_fetch_array($tikm2)){ ?>
  <li><a href="home.php?page=data_responden_tw&tahun=<?php echo $tahun_ikm;?>&tw=<?php echo $tata_ikm['tw'];?>">  <?php echo $tahun_ikm;?> <?php echo $tata_ikm['tw'];?> </a></li>
                        
                        <?php } ?>
                        </li>
                        </ul>
                        <?php } ?>
                    
                    </ul>    
                    </li>
