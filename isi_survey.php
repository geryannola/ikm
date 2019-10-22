<div class="agileits_agile_about">
    <h3>Tabulasi Data Responden <?php echo $_SESSION['nama'];?> <br/>
    Periode <?php echo $tw;?> Tahun <?php echo $tahun;?></h3>
    <div class="agileits_agile_about_mail">
        <table style="margin-left:-10px;">
            <thead>
            <tr bgcolor="#FFCCCC">
                <th>No</th>
                <th>Pertanyaan</th>
                <th style="text-align:center;">Jawaban</th>
                <th style="text-align:center;">Nilai</th>
            </tr>
            <tbody>
			    <?php
				$id_kat=$_GET['id_kat'];
				$id_s=$_SESSION['id_s'];
				$no=1; 	
				$nilai=0;	   
				$matrix="select * from  matrix a, tbl_pertanyaan b where a.id_s=$id_s and a.id_kat=$id_kat and a.id_p=b.id_p ";
				$result2=mysql_query($matrix);
				while($view2=mysql_fetch_array($result2)){
					$nilai+=$view2['nilai'];
				?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $view2['pertanyaan'];?>
                    <td align="center"><?php echo ntxt($view2['nilai']);?></td>
                    <td align="center"><?php echo $view2['nilai'];?></td>
                </tr>
                <?php $no ++;} ?>
                <tr>
                    <td  colspan="3" align="center"><b>Total</b></td>
                    <td align="center"><b><?php echo $nilai;?></b></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>