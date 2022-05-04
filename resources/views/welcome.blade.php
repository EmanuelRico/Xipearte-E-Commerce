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

<h4 class="d-flex justify-content-center my-4 fw-bold">Holi</h4>

<div class=" mx-5 py-3 shadow-lg hscroll" style="overflow-x:scroll;">
    <div class="row flex-row flex-nowrap">
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="/producto/1"  class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5  text-decoration-none">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<h4 class="d-flex justify-content-center my-4 fw-bold">Ofertas</h4>

<div class=" mx-5 py-3 shadow-lg hscroll" style="overflow-x:scroll;">
    <div class="row flex-row flex-nowrap">
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="/producto/1"  class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5  text-decoration-none">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

<h4 class="d-flex justify-content-center my-4 fw-bold">Recien Agregados</h4>

<div class=" mx-5 py-3 shadow-lg hscroll" style="overflow-x:scroll;">
    <div class="row flex-row flex-nowrap">
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="/producto/1"  class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5 ">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
            <a href="" class="text-decoration-none">
                <div class="card shadow" style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text d-flex justify-content-center fw-bold h5  text-decoration-none">Vestido en manta</p>
                        <h3 class="d-flex justify-content-center">$000.00</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection