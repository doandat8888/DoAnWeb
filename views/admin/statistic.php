<?php
include_once "../../controllers/billController.php";
include_once "../../controllers/billDetailController.php";
$billDetailController = new BillDetailController();
$data = $billDetailController->getNumberOfPurchases();
?>
<!-- <html>
<head>
    <link rel="stylesheet" href="./styles/statistic.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawStuff);
        
        function drawStuff() {
            var data = new google.visualization.arrayToDataTable([
                ['Tên sản phẩm', 'Số lượt bán ra', {role: "style"}],
                <?php
                // foreach ($data as $key) {
                //     echo "['". $key['product_name'] ."', ". $key['number_of_purchases'] .", 'background-color: #6C6D70'],";
                // }

                ?>
            ]);

            var options = {
                width: '900',
                // legend: {
                //     position: 'none'
                // },
                // chart: {
                //     title: 'Chess opening moves',
                //     subtitle: 'popularity by percentage'
                // },
                // axes: {
                //     x: {
                //         0: {
                //             side: 'top',
                //             label: 'White to move'
                //         } // Top x-axis.
                //     }
                // },
                bar: {
                    groupWidth: "50%"
                }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            // Convert the Classic options to Material options.
            chart.draw(data, google.charts.Bar.convertOptions(options));
        };
    </script>
    
</head>

<body>
    <div class="container">
        <div class="title">Sản phẩm bán chạy</div>
    </div>
    <div id="top_x_div" style="width: 800px; height: 600px;"></div>
</body>

</html> -->
<html>
    <head>
        <link rel="stylesheet" href="./styles/statistic.css">
    </head>
    <body>
        <div class="container">
            <div class="title">Sản phẩm bán chạy</div>
            <div id="columnchart_values" style="width: 900px; height: 300px;"></div>
        </div>
        
    </body>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Tên sản phẩm", "Số lượt bán ra", {
                    role: "style"
                }],
                <?php
                foreach ($data as $key) {
                    echo "['" . $key['product_name'] . "', " . $key['number_of_purchases'] . ", '#6C6D70'],";
                }
                ?>

            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "Sản phẩm bán chạy",
                width: 900,
                height: 800,
                bar: {
                    groupWidth: "50%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>


</html>

