@php
    use App\Constants\MenuLinks;
    use App\Constants\Icons;

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
        <h1>Települések listája</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Település név</th>
                    <th scope="col">Lat</th>
                    <th scope="col">Lon</th>
                    <th scope="col">Lehetőségek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cities as $city)
                <tr>
                    <td>{{ $city->cityName }}</td>
                    <td>{{ $city->cityLat }}</td>
                    <td>{{ $city->cityLong }}</td>
                    <td>

                        <a href="{{ MenuLinks::TELEPULES_TORLESE }}/{{ $city->id }}" title="Település törlése"><?= Icons::ICON_TORLES; ?></a>
                        <a href="{{ MenuLinks::TELEPULES_VALTOZTATASA }}/{{ $city->id }}" title="Település szerkesztése"><?= Icons::ICON_SZERKESZTES; ?></a>

                        <a href="https://www.google.com/maps/@<?= $city->cityLat ?>,{{ $city->cityLong }},14z?entry=ttu" target="_blank" title="Megtekintés Térképen"><?= Icons::ICON_TERKEP; ?></a>


                        <a href="/{{ MenuLinks::ADATOK_KOMBINALT }}/{{ $city->id }}/<?= date('Y-m-d', time()); ?>" title="Település grafikonja"><i class="fas fa-chart-line"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




</body>
</html>
