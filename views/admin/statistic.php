<html>
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
                ['Tên sản phẩm', 'Số lượt bán'],
                ["King's pawn (e4)", 44],
                ["Queen's pawn (d4)", 31],
                ["Knight to King 3 (Nf3)", 12],
                ["Queen's bishop pawn (c4)", 10],
                ['Other', 3]
                <?php 
                    include_once "../../controllers/billController.php";
                    include_once "../../controllers/billDetailController.php";
                    $listBills = $billController->getAllBill();
                    $link = $listBills[0];
                    $billDetailController = new BillDetailController();
                    $data = $billDetailController->getNumberOfPurchases($link);
                    foreach ($data as $key) {
                        $numberOfPurchases = $key['number_of_purchases'];
                        echo "['".$key['product_name']."', $numberOfPurchases]";
                    }
                ?>
            ]);

            var options = {
                width: 800,
                legend: {
                    position: 'none'
                },
                chart: {
                    title: 'Chess opening moves',
                    subtitle: 'popularity by percentage'
                },
                axes: {
                    x: {
                        0: {
                            side: 'top',
                            label: 'White to move'
                        } // Top x-axis.
                    }
                },
                bar: {
                    groupWidth: "90%"
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

</html>