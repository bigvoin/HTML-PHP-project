<?php
$connect = mysqli_connect("localhost","18usr065","QWAVARYIQ67","18db065");
$query = "SELECT genre, count(*) as number FROM books GROUP BY genre";
 $result = mysqli_query($connect, $query);
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
           <script type="text/javascript">
           google.charts.load('current', {'packages':['corechart']});
           google.charts.setOnLoadCallback(drawChart);
           function drawChart()
           {
                var data = google.visualization.arrayToDataTable([
                          ['Genre', 'Number'],
                          <?php
                          while($row = mysqli_fetch_array($result))
                          {
                               echo "['".$row["genre"]."', ".$row["number"]."],";
                          }
                          ?>
                     ]);
                var options = {
                      title: 'Percentage of the genre in the library',
                      //is3D:true,
                      pieHole: 0.4
                     };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
           }
           </script>
      </head>
      <body>
           <br /><br />
           <div style="width:900px;">
                <h3 align="center">My pie Chart</h3>
                <br />
                <div id="piechart" style="width: 900px; height: 500px;"></div>
           </div>
      </body>
 </html>
