<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Új város hozzáadása</title>
</head>
<body>
    @include('includes.topMenu')

    <div class="container mt-4">
        <h1>Új város hozzáadása</h1>

        @if(session('error'))
            <div class="alert alert-warning" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('addCity') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="cityName">Város neve:</label>
                <input type="text" id="cityName" name="cityName" class="form-control">
                <button type="button" class="btn btn-warning" onclick="koordinataLekerdezes()">Koordináták lekérdezése</button>
            </div>
            <div class="form-group">
                <label for="cityLat">Város szélességi fok:</label>
                <input type="text" id="cityLat" name="cityLat" class="form-control">
            </div>
            <div class="form-group">
                <label for="cityLong">Város hosszúsági fok:</label>
                <input type="text" id="cityLong" name="cityLong" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Hozzáadás</button>
        </form>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>

$(document).ready(function() {
        $('#cityName').on('change', function() {
            var cityName = $(this).val();
            koordinataLekerdezes(cityName);
        });

    });


    function koordinataLekerdezes() {

            let cityName = document.getElementById('cityName').value;
            $.ajax({
                url: '/getcityCoordinates',
                method: 'GET',
                data: { cityName: cityName },
                success: function(response) {
                    $('#cityLat').val(response.lat);
                    $('#cityLong').val(response.lon);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }




</script>




</body>
</html>
