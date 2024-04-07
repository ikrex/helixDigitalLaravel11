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

    A(z) {{ $cityName }} település tárolt időjárási adatai<br>
    <div style="width: 800px; height: 400px;">
        <canvas id="temperatureChart"></canvas>
    </div>


    <div style="width: 800px; height: 400px;">
        <canvas id="humidityChart"></canvas>
    </div>


    <div style="width: 800px; height: 400px;">
        <canvas id="windSpeedChart"></canvas>
    </div>

</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>



<script>
    // Adatok definiálása
    var hours = [];
    var temperatures = [];
    var humidity = [];
    var windSpeed = [];


    // Adatok feltöltése a weatherData alapján
    @foreach($weatherData as $data)
        hours.push("{{ $data->dataStoredTime }}"); // vagy a hozzátartozó idő része
        temperatures.push({{ $data->tempereture }}); // hőmérséklet
        humidity.push({{ $data->humidity }}); // páratartalom
        windSpeed.push({{ $data->windSpeed }}); // Szélsebesség
    @endforeach

    // Vonaldiagram létrehozása
    var tempCtx = document.getElementById('temperatureChart').getContext('2d');
    var lineChart = new Chart(tempCtx, {
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
                        text: 'Időpont'
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



    var humidityCtx = document.getElementById('humidityChart').getContext('2d');
    var lineChart = new Chart(humidityCtx, {
        type: 'line',
        data: {
            labels: hours,
            datasets: [{
                label: 'Páratartalom',
                data: humidity,
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
                        text: 'Időpont'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Páratartalom (%)'
                    }
                }
            }
        }
    });


    var windSpeedCtx = document.getElementById('windSpeedChart').getContext('2d');
    var lineChart = new Chart(windSpeedCtx, {
        type: 'line',
        data: {
            labels: hours,
            datasets: [{
                label: 'Szélsebesség',
                data: windSpeed,
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
                        text: 'Időpont'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Szélsebesség (km/h)'
                    }
                }
            }
        }
    });


</script>



</body>
</html>
