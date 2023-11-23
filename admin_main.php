<?php
include 'document.php';
include 'dashboard.php';
if(isset($_SESSION['admin'])){
    $name = $_SESSION['admin'];
}

$sql="select count('id') from tb_users";
$sql1="select count('status') from tb_users where status='1'";

$result1=mysqli_query($conn,$sql1);
$row1=mysqli_fetch_array($result1);

$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

mysqli_close($conn);
 
            
  

?>
<!DOCTYPE html>
<html>
	<head>
		<script type="text/javascript" src="jquery.min.js"></script>
		<script type="text/javascript" src="Chart.min.js"></script>
		<style type="text/css">

            .ttt table th
            {
                text-decoration: underline;
                font-size: 85px;
                color: #40407a;
                font-weight: bold;
                font-family: sans-serif;
            }
            .tt
            {
                display: flex;
            }
            .ppp 
            {
                margin-left: 330px;
                margin-top: 100px;
                width: 20%;
                background-color: #576574;
                color: #1e272e;
                border:1px solid #F8EFBA;
                border-radius: 22px;
                box-shadow: 5px 10px 18px #888888;

                
            }
            .ppp td,th
            {
                
                padding: 10px 10px;
                text-align: center;
                font-size: 30px;
                font-family: sans-serif;
                font-weight: bold;
            }
            .ppp th
            {
                text-decoration: underline;
            }
            .ppp td
            {
                font-size: 60px;
            }
            #chart-container
            {
                width: 60%;
                margin-left: 380px;
                margin-top: 150px;
                font-size: 100px;
            }
			#graphCanvas
			{
				
				height: 10px;
				width: 10px;
			}
		</style>

	</head>
	<body>
        <div class="ttt">
            <table align="center">
                <tr>
                    <th>Welcome <?=$name?> </th>
                </tr>
            </table>
        </div>
        <div class="tt">
            <table class="ppp">
                <tr>
                    <th>
                         Number of User
                    </th>
                </tr>
                <tr>
                    <td> <?php echo "$row[0]";
            ?></td>
                </tr>
               
            </table>
           <table class="ppp">
               <tr>
                   <th>Voters</th>
               </tr>
               <tr>
                   <td> <?php echo "$row1[0]";?></td>
               </tr>
           </table>
            
        </div>
            
            
            

        
		<div id="chart-container">
        <canvas id="graphCanvas"></canvas>
        <canvas id="graphCanvas1"></canvas>
    </div>
		<script>
        $(document).ready(function () {
            showGraph();
           
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var name = [];
                    var vote = [];

                    for (var i in data) {
                        name.push(data[i].candidate_name);
                        vote.push(data[i].number_of_vote);
                    }

                    var chartdata = {
                        labels: name,
                        datasets: [
                            {
                                label: 'canidate vote',
                                backgroundColor: 'black',
                                borderColor: 'black',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: 'black',
                                data:vote
                            }
                        ]

                    };
                    

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });

                });

            }

        }



        
        </script>

	</body>
</html>