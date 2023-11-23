<!DOCTYPE html>
<html>
<head>
<title>Creating Dynamic Data Graph using PHP and Chart.js</title>
<style type="text/css">
body {
    width: 550PX;
}

#chart-container {
    width: 100%;
    height: auto;
}
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="Chart.min.js"></script>


</head>
<body>
    <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
        <canvas id="graphCanvas1"></canvas>
    </div>

    <script>
        $(document).ready(function () {
            showGraph();
            showGraph1();
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
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
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



        function showGraph1()
        {
            {
                $.post("data1.php",
                function (data1)
                {
                    console.log(data1);
                     var name1= [];
                    var vote1= [];

                    for (var j in data1) {
                        name1.push(data1[j].party_id);
                        vote1.push(data1[j].number_of_vote);
                    }

                    var chartdata1 = {
                        labels: name1,
                        datasets: [
                            {
                                label: 'canidate vote',
                                backgroundColor: '#49e2ff',
                                borderColor: '#46d5f1',
                                hoverBackgroundColor: '#CCCCCC',
                                hoverBorderColor: '#666666',
                                data:vote1
                            }
                        ]
                    };

                    var graphTarget1 = $("#graphCanvas1");

                    var barGraph1 = new Chart(graphTarget1, {
                        type: 'bar',
                        data: chartdata1
                    });
                });
            }
        }
        </script>


</body>
</html>