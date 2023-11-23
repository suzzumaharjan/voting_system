<?php
include'document.php';
$sql="select candidate_name,number_of_vote from ballots";
$result=mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['candidate_name', 'number_of_vote'],
       

          <?php

          while($value=mysqli_fetch_assoc($result))
          {
          	echo"['".$value['candidate_name']."',".$value['number_of_vote']."]";
          }
          ?>
         
        ]);

        var options = {
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
  </body>
</html>