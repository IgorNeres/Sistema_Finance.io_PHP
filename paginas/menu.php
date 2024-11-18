<?php
    include '../comandos/connection.php';
    include '../comandos/protect.php';

    $sql_bar = "SELECT apelido_com, SUM(valor_com) AS total_valor FROM compra GROUP BY apelido_com";
    $result_bar = $connectionBD->query($sql_bar);
    $data_bar = [['Apelido', 'Valor Total']];
    if ($result_bar->num_rows > 0) {
        while ($row = $result_bar->fetch_assoc()) {
            $data_bar[] = [$row['apelido_com'], (float)$row['total_valor']];
        }
    }

    $sql_line = "SELECT DATE(data_com) AS data_venda, SUM(valor_com) AS total_vendas FROM compra GROUP BY DATE(data_com)";
    $result_line = $connectionBD->query($sql_line);
    $data_line = [['Data', 'Total de Vendas']];
    if ($result_line->num_rows > 0) {
        while ($row = $result_line->fetch_assoc()) {
            $data_line[] = [$row['data_venda'], (float)$row['total_vendas']];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', { packages: ['corechart'] });
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            var dataBar = google.visualization.arrayToDataTable(<?php echo json_encode($data_bar); ?>);
            var optionsBar = {
                title: 'Total de Compras por Apelido',
                hAxis: { title: 'Valor Total', minValue: 0 },
                vAxis: { title: 'Apelido' },
                bars: 'horizontal',
                colors: ['#198754']
            };
            var barChart = new google.visualization.BarChart(document.getElementById('bar_chart_div'));
            barChart.draw(dataBar, optionsBar);

            var dataLine = google.visualization.arrayToDataTable(<?php echo json_encode($data_line); ?>);
            var optionsLine = {
                title: 'Total de Vendas por Data',
                hAxis: { title: 'Data' },
                vAxis: { title: 'Total de Vendas' },
                curveType: 'function',
                legend: { position: 'bottom' },
                colors: ['#198754']
            };
            var lineChart = new google.visualization.LineChart(document.getElementById('line_chart_div'));
            lineChart.draw(dataLine, optionsLine);
        }
    </script>
</head>
<body>
    <nav class="navbar bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">
                <img src="img/logo-white.png" width="30" height="30" class="d-inline-block align-text-top">
                Finance.io
            </a>
        </div>
    </nav>

    <div class="container col-md-8 offset md-3">
        <div class="row p-3 text-center">
            <div class="col m-2">
                <a href="clientes.php" class="btn btn-outline-warning d-grid gap-1 fs-2 font-monospace" style="height: 160px;">
                    <div class="row">
                        <i class="bi bi-person-lines-fill" style="font-size: 5rem;"></i>
                    </div>
                    <div class="row" style="margin-top: -2rem !important">
                        <p>Clientes</p>
                    </div>
                </a>
            </div>

            <div class="col m-2">
                <a href="fiados.php" class="btn btn-outline-info d-grid gap-1 fs-2 font-monospace" style="height: 160px;">
                    <div class="row">
                        <i class="bi bi-card-list" style="font-size: 5rem;"></i>
                    </div>
                    <div class="row" style="margin-top: -2rem !important">
                        <p>Fiados</p>
                    </div>
                </a>
            </div>

            <div class="col m-2">
                <a href="produtos.php" class="btn btn-outline-danger d-grid gap-1 fs-2 font-monospace" style="height: 160px;">
                    <div class="row">
                        <i class="bi bi-basket2" style="font-size: 5rem;"></i>
                    </div>
                    <div class="row" style="margin-top: -2rem !important">
                        <p>Produtos</p>
                    </div>
                </a>
            </div>
        </div> 
        
        <hr class="border border-dark border-2 opacity-50">

        <div class="row">
            <div class="col">
                <div id="bar_chart_div" style="width: 469px; height: 400px;"></div>
            </div>
            <div class="col">
                <div id="line_chart_div" style="width: 469px; height: 400px;"></div>
            </div>
        </div>
    </div>

    <div class="position-absolute bottom-0 start-0">
        <a href="../comandos/logout.php" class="btn btn-outline-danger"><i class="bi bi-box-arrow-left"></i> Sair</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
