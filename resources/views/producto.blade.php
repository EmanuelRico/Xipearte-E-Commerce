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

<body>

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
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (Route::has('login'))
                            @auth
                                <li><a href="{{ url('/dashboard') }}" class="text-muted dropdown-item">Dashboard</a></li>
                            @else
                                <li><a class="fs-6 dropdown-item" href="{{ route('login') }}">Inicia Sesión</a></li>
    
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
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 mt-3">
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
            </div>
            <div class="col-12 col-md-6 mt-3 row justify-content-center">
                <div class="col-10 col-md-9">
                    <h4 id="placeOrigin"> Zinacantan, Chiapas</h4>
                    <h1 id="nameProduct">Vestido en manta</h1>
                    <p id ="descriptionProduct">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate pariatur excepturi unde voluptatem rem consectetur dolorem ut. Ullam officiis, ut dolore delectus perferendis asperiores! Assumenda omnis voluptatum atque nisi repudiandae.</p>
                    <div>
                        <button type="button" class="btn btn-outline-dark">XS</button>
                        <button type="button" class="btn btn-outline-dark">S</button>
                        <button type="button" class="btn btn-outline-dark">M</button>
                        <button type="button" class="btn btn-outline-dark">L</button>
                        <button type="button" class="btn btn-outline-dark">XL</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
