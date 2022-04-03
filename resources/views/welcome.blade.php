<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Xipearte</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="bg-white">

    <div class="container-fluid d-flex">
        <img src="{{ asset('assets/logo.jpeg') }}" style="max-height: 60px;" alt="">
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3">
        <div class="container-fluid container-xxl">
            <a class="navbar-brand title-hover text-white" href="#">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#">Nosotros</a>
                    </li>
                </ul>
                
                <div class="pt-0 pb-3 py-lg-0 col-12 col-lg-4">
                    <form class="d-flex">
                        @csrf
                        <input class="form-control me-2 " type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-primary me-3" type="submit"><i class="title-hover fa-solid fa-lg fa-magnifying-glass text-white"></i></button>
                    </form>
                </div>

                <li class="nav-item dropdown pt-1 pt-lg-0 d-flex align-items-center">
                    <a class="nav-link dropdown-toggle px-0 fa-solid fa-user fa-lg text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                    <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="text-muted dropdown-item">Dashboard</a></li>
                            @else
                                <li><a class="fs-6 me-1 dropdown-item" href="{{ route('login') }}">Inicia Sesión</a></li>
    
                                @if (Route::has('register'))
                                    <li><a class="fs-6 dropdown-item" href="{{ route('register') }}">Registrate</a></li>
                                @endif
                            @endif
                        @endif
                    </ul>
                </li>
            </div>
        </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active img-fluid" style="max-height: 400px;" data-bs-interval="2000">
                <img src="{{ asset('assets/carousel-1.jpeg') }}" class="d-block w-100" alt="...">
                {{-- <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div> --}}
            </div>
            <div class="carousel-item img-fluid" style="max-height: 400px;" data-bs-interval="2000">
                <img src="{{ asset('assets/carousel-2.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item img-fluid" style="max-height: 400px;" data-bs-interval="2000">
                <img src="{{ asset('assets/carousel-3.jpeg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item img-fluid" style="max-height: 400px;" data-bs-interval="2000">
                <img src="{{ asset('assets/carousel-4.jpeg') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <h4 class="d-flex justify-content-center my-4 fw-bold">De Temporada</h4>

    <div class="container-fluid" style="overflow-x:scroll;">
        <div class="row flex-row flex-nowrap">
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
