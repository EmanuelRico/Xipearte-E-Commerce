@php
use App\Models\Category;
$c_dropdown = Category::all();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Styles -->
    @yield('css')
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!--Title-->
    <title>
        @yield('title')
    </title>

</head>

<body class="font-sans antialiased bg-white">

    @if (!\Request::is('register'))
        @if (!\Request::is('login'))
            <div class="container-fluid d-flex justify-content-center">
                <a href="/" class=""><img src="{{ asset('assets/logo.jpeg') }}" style="max-height: 60px;"
                        alt=""></a>
            </div>
        @endif
    @endif
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary py-3 sticky-top">
        <div class="container-fluid container-xxl d-flex">
            <a class="navbar-brand title-hover text-white" href="/">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="/productos">Productos</a>
                    </li>

                    <li class="nav-item me-3">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle px-0" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categorías
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                @foreach ($c_dropdown as $c)
                                    <li><a class="dropdown-item"
                                            href="/categoria/{{ $c->id }}">{{ $c->name }}</a></li>
                                @endforeach

                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/categorias">Todas las categorías</a></li>
                            </ul>
                        </div>
                    </li>
                    
                    <li class="nav-item me-3">
                        <a class="nav-link text-white" href="/nosotros">Nosotros</a>
                    </li>
                    @guest
                    @else
                        @if (Auth::user()->type == 1)
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/pedidos">Pedidos</a>
                            </li>
                        @endif
                    @endguest
                </ul>

                <div class="pt-0 pb-3 py-lg-0 col-12 col-lg-4">
                    <form class="d-flex" action="/buscar" method="GET">
                        @csrf
                        <input class="form-control me-2 " name="search" id="search" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-primary" type="submit"><i
                                class="title-hover fa-solid fa-lg fa-magnifying-glass text-white me-1"></i></button>
                    </form>
                </div>

                @auth
                    @guest
                    @else
                        @if (Auth::user()->type == 1)
                            <div class="nav-item dropdown pt-1 pt-lg-0 d-flex align-items-center ms-1">
                                <a class="nav-link dropdown-toggle px-0 fa-solid fa-lg text-white me-3" href="#"
                                    id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i
                                        class="title-hover fa-lg fa-solid fa-cart-shopping text-white"></i> <span
                                        class="mt-2 text-white"
                                        style="font-size:12px">{{ count((array) session('cart')) }}</span></a>

                                <ul class="dropdown-menu dropdown-menu-lg-end" style="width: 275px"
                                    aria-labelledby="navbarDropdown">
                                    <div class="container overflow-auto" style="height: 305px">
                                        <div class="row total-header-section">
                                            <div class="col">
                                                <a class="px-0 text-white"><i
                                                        class="title-hover fa-lg fa-solid fa-cart-shopping me-3"></i></a>
                                            </div>
                                            @php $total = 0 @endphp
                                            @foreach ((array) session('cart') as $id => $details)
                                                @php $total += $details['price'] * $details['quantity'] @endphp
                                            @endforeach
                                            <div class="col text-right">
                                                <p>Total: <span class="">$ {{ $total }}</span></p>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="dropdown-divider"></div>
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $details)
                                                    <div class="row my-3">
                                                        <div class="col-4">

                                                            <img src="{{ asset($details['rImage']) }}" alt="..."
                                                                class="cssCenterImageCart">
                                                        </div>
                                                        <div class="col ms-3">
                                                            <div class="row">
                                                                <p class="mb-1 col-12">{{ $details['name'] }}</p>
                                                                <span class="col-12" style="color:rgb(119, 118, 118)" id="valores">
                                                                    ${{ $details['price'] }}</span>
                                                                <span class="col-12" style="color:rgb(119, 118, 118)" id="valores">
                                                                    Talla: {{ $details['size'] }}</span>
                                                                <span class="count col-12 " style="color:rgb(119, 118, 118)"> Cantidad:
                                                                        {{ $details['quantity'] }}</span>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="dropdown-divider"></div>
                                            <div class="row mx-3">
                                                <a href="{{ route('cart') }}" class="btn btn-primary m-auto"
                                                    id="checkout">Ir al carrito</a>
                                            </div>
                                        </div>
                                    </div>
                                </ul>

                            </div>


                        @endif
                        @endif
                    @endguest

                    <li class="nav-item dropdown pt-1 pt-lg-0 d-flex align-items-center ms-1">
                        <a class="nav-link dropdown-toggle px-0 fa-solid fa-user fa-lg text-white" href="#"
                            id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDropdown">
                            @if (Route::has('login'))
                                @auth
                                    <h6 class="dropdown-header small text-muted">
                                        {{ __('Administración de cuenta') }}
                                    </h6>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Mi Perfil') }}
                                    </x-jet-dropdown-link>
                                    @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                            {{ __('API Tokens') }}
                                        </x-jet-dropdown-link>
                                    @endif

                                    <hr class="dropdown-divider">

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </x-jet-dropdown-link>
                                    <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                        @csrf
                                    </form>
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

            <!-- Page Heading -->
            {{-- <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header> --}}

            <!-- Page Content -->
            {{-- <main class="container my-5">
             {{ $slot }} 
        </main> --}}
            <div class="container-100">
                @yield('content')
            </div>

            <footer class="footer py-3 mt-3 bg-primary text-white">
                <div class="d-flex justify-content-around">
                    <div class="px-5 mx-1"></div>
                    <h2 class="fw-bolder m-0">XIPEARTE</h2>
                    <div>
                        <a href="https://www.instagram.com/xipearte" class="btn btn-primary" type="submit"><i
                                class="title-hover fa-brands fa-xl fa-instagram"></i></a>
                        <a href="https://www.facebook.com/XipeArte" class="btn btn-primary" type="submit"><i
                                class="title-hover fa-brands fa-xl fa-facebook-square"></i></a>
                    </div>
                </div>
            </footer>

            @stack('modals')

            @livewireScripts

            @stack('scripts')

            
        </body>

        </html>
