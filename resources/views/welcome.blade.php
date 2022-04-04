@extends('layouts.app')

@section('title',"Xipearte")

@section('content')
<div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active img-fluid" style="max-height: 400px;" data-bs-interval="3000">
            <img src="{{ asset('assets/carousel-1.jpeg') }}" class="d-block w-100" alt="...">
            {{-- <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div> --}}
        </div>
        <div class="carousel-item img-fluid" style="max-height: 400px;" data-bs-interval="3000">
            <img src="{{ asset('assets/carousel-2.jpeg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item img-fluid" style="max-height: 400px;" data-bs-interval="3000">
            <img src="{{ asset('assets/carousel-3.jpeg') }}" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item img-fluid" style="max-height: 400px;" data-bs-interval="3000">
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
            <a href="/producto/1">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text text-decoration-none">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection