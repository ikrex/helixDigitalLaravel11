@php
    use App\Constants\MenuLinks;
@endphp


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
        <h1>Települések törlése</h1>

        <form id="deleteCityForm" method="post">
            @csrf
            <label for="city">Város kiválasztása:</label>
            <select name="city" id="city">
                @foreach($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->cityName }}</option>
                @endforeach
            </select><br>
            <button class="brn btn-success" type="submit">Település Törlése</button>
        </form>

        <script>
            var deleteCityRoute = "/deleteCity/:id";

            document.getElementById('deleteCityForm').addEventListener('submit', function(event) {
                event.preventDefault();
                var selectedCityId = document.getElementById('city').value;
                var formAction = deleteCityRoute.replace(':id', selectedCityId);
                this.setAttribute('action', formAction);
                this.submit();
            });
        </script>

</body>
</html>

