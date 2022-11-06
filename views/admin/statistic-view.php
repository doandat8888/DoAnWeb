<html>
    <head>
        <link rel="stylesheet" href="./styles/statistic.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="title">Sản phẩm bán chạy</div>
                <div id="columnchart_values"></div>
            </div>
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