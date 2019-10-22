<script src="Chart.bundle.js"></script>

<?php if(isset($_GET['tahun'])){
$id_kat=intval($_GET['kat']);

$tahun=intval($_GET['tahun']);

?>

<div class="agileits_agile_about">
										<h3>Grafik Survey</h3>
										<div class="agileits_agile_about_mail">
 


 
    


 </div>
 
 
      </div>
      
      <div class="container">
            <canvas id="myChart" width="100" height="100"></canvas>
        </div>
<?php        
$tikm="select * from tbl_pesan where tahun = $tahun and id_kat=$id_kat group by tw asc";
								$tikm2=mysql_query($tikm);		
					 			  ?>
                                                                   
        <script>
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: [<?php while($tata_ikm=mysql_fetch_array($tikm2)) { echo '"' . $tata_ikm['tw'] . '",';}?>],
                    datasets: [{
                            label: '# of Votes',
                            data: [],
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)'
                            ],
                            borderWidth: 1
                        }]
                },
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                    }
                }
            });
        </script>
 <?php } ?>