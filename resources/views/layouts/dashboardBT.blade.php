<!doctype html>
<html lang="es-MX">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repositorio Digital de Infomación Estadística</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <img src="{{ asset('assets/img/logo_h1.png') }}" alt="" class="p-1">
                    </div>
                    <div-col-xs-12 class="col-sm-12-col-md-9 col-lg-9 col-xl 9">
                        <h2>Instituto de Información e Investigación Geográfica, Estadística y Catastral del Estado de
                            México IGECEM</h2>
                    </div-col-xs-12>
                </div>
                <hr class="border border-danger border-2">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <h4>Dirección de Estadística</h4>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <h4>Secretaría de Finanzas</h4>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                        <ul class="nav nav-underline">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Directorio de Informantes</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card text-bg-dark">
                    <div class="card-img wrapper"></div>
                    <div class="card-img-overlay">
                        <h5 class="card-title wrapper-content"></h5>
                        <!-- <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small>Last updated 3 mins ago</small></p> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 justify-content-center items-center text-center border border-warning rounded m-2">
                <div class="row">
                    <div class="col-3">
                        <div class="alert alert-warning" role="alert">
                            <span class="material-symbols-outlined">
                                home
                            </span>
                        </div>
                    </div>
                    <div class="col-9 justify-content-center text-center items-center">Demografia y Sociedad</div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 justify-content-center items-center text-center border border-infc rounded m-2">
                <div class="row">
                  <div class="col-3">
                    <div class="alert alert-info" role="alert">
                      <span class="material-symbols-outlined">
                        currency_exchange
                      </span>
                    </div>
                  </div>
                  <div class="col-9 justify-center text-center">
                    Economia y Sectores Productivos
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 justify-content-center items-center text-center border border-success rounded m-2">
                <div class="row">
                  <div class="col-3">
                    <div class="alert alert-success" role="alert">
                      <span class="material-symbols-outlined">
                        pin_drop
                      </span>
                    </div>
                  </div>
                  <div class="col-9">
                    Geografia y Medio Ambiente
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 justify-content-center items-center text-center border border-danger rounded m-2">
                <div class="row">
                  <div class="col-3">
                    <div class="alert alert-danger" role="alert">
                      <span class="material-symbols-outlined">
                        admin_panel_settings
                      </span>
                    </div>
                  </div>
                  <div class="col-9 justify-center text-center">
                    Gobierto, Seguridad y Justicia
                  </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
