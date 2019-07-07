<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js"></script>
</head>
<body>
    <header>
        <?php
        include_once "./php/utils/nav.html";
        ?>
    </header>
    <div class="chart-container" style="position: relative; height:40vh; width:40vw">
        <canvas id="myChart" width="200" height="200"></canvas>
    </div>
    <div class="chart-container" style="position: relative; height:40vh; width:40vw">
        <canvas id="myChart2" width="200" height="200"></canvas>
    </div>
    <script type="text/javascript" src="./js/statistics.js"></script>
</body>
</html>