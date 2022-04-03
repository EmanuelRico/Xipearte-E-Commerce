<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!--Title-->
        <title>
            @yield('title')
        </title>
        
    </head>
    <body class="font-sans antialiased bg-light">
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
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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
        <div class="py-4">
            @yield('content')
        </div>

        @stack('modals')

        @livewireScripts

        @stack('scripts')
        
    </body>
</html>
