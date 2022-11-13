@extends('layouts.app')

@section('title', 'Xipearte')

@section('css')
    <style>
        .active {
            border: 3px solid;
            border-color: black;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if ($producto->imagenes->count() > 0)


                <div class="col-12 col-md-5 mt-3">

                    <div>
                        <img class="w-100  mx-auto d-block pro-img rounded"
                            src="{{ asset($producto->imagenes->first()->route) }} " style="max-width:400px">
                    </div>

                    <div class="container-fluid pt-4 hscroll" style="overflow-x:scroll;">

                        <div class="thumb-img row flex-row flex-nowrap">
                            @foreach ($producto->imagenes as $i)
                                @if ($i->id == $producto->imagenes->first()->id)
                                    <div class="box active col-4 col-md-5 col-lg-3 col-xl-4 col-xxl-3 d-flex justify-content-center mx-3 rounded"
                                        onclick="changeImage(this)">
                                        <img src="{{ asset($i->route) }}"
                                            class="card-img-top rounded img-fluid">
                                    </div>
                                @else
                                    <div class="box col-4 col-md-5 col-lg-3 col-xl-4 col-xxl-3 d-flex justify-content-center mx-3 rounded"
                                        onclick="changeImage(this)">
                                        <img src="{{ asset($i->route) }}"
                                            class="card-img-top rounded img-fluid">
                                    </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                </div>
            @else
                <div class="col-12 col-md-5 mt-3">
                    <div>
                        <img class="w-100  mx-auto d-block pro-img"
                            src="https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg"
                            style="max-width:400px">
                    </div>
                </div>

            @endif
            <div class="col-12 col-md-7 mt-3 row justify-content-center">
                <div class="col-10 col-md-9">
                    <h4 id="placeOrigin"> {{ $producto->origin }}</h4>
                    <h1 id="nameProduct" class="fw-bold">{{ $producto->name }}</h1>
                    <h4 id="descriptionProduct" class="fw-bold">{{ $producto->description }}</h4>

                    @if($producto->stock > 0 )
                    <form action="/add-to-cart" method="get">
                        <input type="hidden" name="id" value="{{ $producto->id}}">
                        <div class="d-flex justify-content-between mt-3">
                            <h5>Selecciona la talla</h5>
                            @foreach ($sizes as $s)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="size"
                                        id="radio-{{ $s->size }}" value="{{ $s->size }}" required>
                                    <label class="form-check-label text-uppercase"
                                        for="radio-{{ $s->size }}">{{ $s->size }}</label>
                                </div>
                            @endforeach
                        </div>
                        <h1 id="price" class="mt-3">${{ $producto->price }}</h1>
                        @auth
                            <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3">
                                <h4 class="my-0 py-0">Añadir al carrito</h4>
                            </button>
                        @else
                            <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"
                                onclick="location.href='{{ route('login') }}'">
                                <h4 class="my-0 py-0">Añadir al carrito</h4>
                            </button>
                            @endif
                        </form>
                    @else
                    <h5>

                        Producto no disponible
                    </h5>
                    @endif

                        <div class=" border border-3 rounded-3 border-dark p-2 mt-5">
                            <p class="fw-bold">Acerca del lugar de origen</p>
                            <p>{{ $producto->originDescription }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-5">
            <h3 class="fw-bold">Tus últimas visitas</h3>
            <div class="container-fluid  shadow-lg hscroll rounded" style="overflow-x:scroll;">
                <div class="row flex-row flex-nowrap">
                    @foreach ($productos as $lastView)
                        <div class="col col-md-5 col-lg-3 d-flex justify-content-center my-3">
                            <a href="/producto/{{ $lastView->id }}" class="text-decoration-none">
                                <div class="card shadow text-center">
                                @if($lastView->imagenes->count()>0)
                                    <img src='{{ asset($lastView->imagenes->first()->route) }}' class="card-img-top img-fluid mx-auto d-block rounded" 
                                        style="min-height:380px;max-height: 380px;max-width:285px;min-width:285px" alt="...">
                                @else
                                    <img src='https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg' class="card-img-top img-fluid mx-auto d-block rounded" 
                                        style="min-height:380px;max-height: 380px;max-width:285px;min-width:285px" alt="...">
                                @endif
                                    <div class="card-body">
                                        <h5 class="fw-bold card-text text-center text-truncate" style="max-width:285px">{{ $lastView->name }}</h5>
                                        <h4 class="fw-bold card-text text-center" style="max-width:285px"> ${{ $lastView->price }}</h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- <div class="card shadow">
            @if($lastView->imagenes->count()>0)
                <img src='{{ asset($lastView->imagenes->first()->route) }}' class="img-fluid mt-0 rounded"
                    style="min-height: 380px;min-width:185px;" alt="...">
            @else
                <img src='https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg' class="img-fluid mt-0 rounded"
                    style="min-height: 380px;min-width:1850px" alt="...">
            @endif
            <div class="card-body">
                <p class="card-title text-center fw-bold h5 text-truncate">{{ $lastView->name }}</p>
                <h3 class=" card-text d-flex justify-content-center">${{ $lastView->price }}</h3>
            </div>
        </div> -->
    @endsection

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script>
            const thumbs = document.querySelector(".thumb-img").children;
            console.log(thumbs);

            function changeImage(event) {
                document.querySelector('.pro-img').src = event.children[0].src;
                for (let i = 0; i < thumbs.length; i++) {
                    thumbs[i].classList.remove("active")
                }
                event.classList.add("active");
            }
        </script>
    @endpush
