@php
    use App\Constants\MenuLinks;
@endphp
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Település adatainak változtatása</title>
</head>
<body>
    @include('includes.topMenu')

    <div class="container mt-4">
        <h1>Település adatainak változtatása</h1>

        <form action="<?= MenuLinks::TELEPULES_VALTOZTATASA; ?>" method="post">
            @csrf
            <div class="form-group">
                <label for="cityName">Város neve:</label>
                <input type="text" id="cityName" name="cityName" class="form-control" value="{{ $city->cityName }}">
            </div>
            <div class="form-group">
                <label for="cityLat">Város szélességi fok:</label>
                <input type="text" id="cityLat" name="cityLat" class="form-control" value="{{ $city->cityLat }}">
            </div>
            <div class="form-group">
                <label for="cityLong">Város hosszúsági fok:</label>
                <input type="text" id="cityLong" name="cityLong" class="form-control" value="{{ $city->cityLong }}">
            </div>
            <input type="hidden" id="cityId" name="cityId" value="{{ $city->id }}">
            <button type="submit" class="btn btn-primary">Település adatainak szerkesztése</button>
        </form>
    </div>




</body>
</html>
