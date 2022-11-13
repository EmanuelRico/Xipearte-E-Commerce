@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>

        <div class="carousel-inner">
            @php
                $isFirst = true;
            @endphp
            @foreach ($images_carousel as $item)
                <a href='/producto/{{$item[0]}}' class="carousel-item @if ($isFirst) active
                @php
                    $isFirst = false;
                @endphp @endif img-fluid"
                    style="max-height: 400px;" data-bs-interval="3000">
                    <img src="{{ asset($item[1]) }}" class="d-block w-100" alt="...">

                </a>
            @endforeach

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

    <h4 class="d-flex justify-content-center my-4 fw-bold">Recién agregados</h4>

    <div class=" mx-5 py-3 shadow-lg hscroll" style="overflow-x:scroll;">
        <div class="row flex-row flex-nowrap">
            @foreach ($lastProducts as $p)
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                    <a href="/producto/{{ $p->id }}" class="text-decoration-none">
                        <div class="card shadow" style="max-width: 20rem;">
                            <img src="{{ asset($p->imagenes->first()->route) }}" class="img-fluid "
                                style="min-height: 430px;min-width:200px">
                            <div class="card-body">
                                <p class="card-title text-center fw-bold h5 text-truncate">{{ $p->name }}</p>
                                <h3 class=" card-text d-flex justify-content-center">${{ $p->price }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <h4 class="d-flex justify-content-center my-4 fw-bold">Menores a $350</h4>

    <div class=" mx-5 py-3 shadow-lg hscroll" style="overflow-x:scroll;">
        <div class="row flex-row flex-nowrap">

            @foreach ($lowcost as $lw)
                <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                    <a href="/producto/{{ $lw->id }}" class="text-decoration-none">
                        <div class="card shadow" style="max-width: 20rem;">
                            <img src="{{ asset($lw->imagenes->first()->route) }}" class="img-fluid "
                                style="min-height: 430px;min-width:200px">
                            <div class="card-body">
                                <p class="card-title text-center fw-bold h5 text-truncate">{{ $lw->name }}</p>
                                <h3 class=" card-text d-flex justify-content-center">${{ $lw->price }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <h4 class="d-flex justify-content-center my-4 fw-bold">Últimas piezas</h4>

    <div class=" mx-5 py-3 shadow-lg hscroll" style="overflow-x:scroll;">
        <div class="row flex-row flex-nowrap">

            @foreach ($lastPieces as $lastPieces2)
                @foreach ($lastPieces2 as $p)
                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                        <a href="/producto/{{ $p->id }}" class="text-decoration-none">
                            <div class="card shadow" style="max-width: 20rem;">
                                <img src="{{ asset($p->imagenes->first()->route) }}" class="img-fluid "
                                    style="min-height: 430px;min-width:200px">
                                <div class="card-body">
                                    <p class="card-title text-center fw-bold h5 text-truncate">{{ $p->name }}</p>
                                    <h3 class=" card-text d-flex justify-content-center">${{ $p->price }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>

@endsection
