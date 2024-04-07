
@php
    use App\Constants\MenuLinks;
@endphp

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">


<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand">helixDigital próbafeladat</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Városokkal kapcsolatos műveletek
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ MenuLinks::TELEPULES_LISTA }}">Városok listája</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ MenuLinks::UJ_TELEPULES }}">Új város</a>
                      <a class="dropdown-item" href="{{ MenuLinks::TELEPULES_VALTOZTATASA }}">Város szerkesztése</a>
                      <a class="dropdown-item" href="{{ MenuLinks::TELEPULES_TORLESE }}">Város törlése</a>
                    </div>
                  </li>


                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Adatok
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ MenuLinks::ADATOK_HOMERSEKLETEK }}">Hőmérsékleti adatok</a>
                      <a class="dropdown-item" href="{{ MenuLinks::ADATOK_PARATARTALOM }}">Páratartalom adatok</a>
                      <a class="dropdown-item" href="{{ MenuLinks::ADATOK_SZELSEBESSEG }}">Szélsebesség adatok</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="{{ MenuLinks::ADATOK_KOMBINALT }}">Kombinált adatok</a>
                    </div>
                  </li>



            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
