<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Települések listája</title>
</head>
<body>
@include('includes.topMenu')

<div class="container mt-4">

    @php
        print_r($weatherData);
    @endphp

    <div style="width: 800px; height: 400px;">
        <canvas id="lineChart"></canvas>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>

    <script>
        // Adatok definiálása
        var hours = ["00:00", "01:00", "02:00", "03:00", "04:00", "05:00", "06:00", "07:00", "08:00", "09:00", "10:00", "11:00"];
        var temperatures = [20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31];

        // Vonaldiagram létrehozása
        var ctx = document.getElementById('lineChart').getContext('2d');
        var lineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: hours,
                datasets: [{
                    label: 'Hőmérséklet',
                    data: temperatures,
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Óra'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Hőmérséklet (°C)'
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
