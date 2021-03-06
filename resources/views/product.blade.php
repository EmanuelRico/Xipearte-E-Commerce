@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')
    <div class="container">
        <div class="row  ">
            <div class="col-12 col-md-6 mt-3">
                <div>
                    <img class="w-100 float-end" src="{{ asset('assets/' . $images[0]->route) }}">
                </div>

                <div class="container-fluid pt-4" style="overflow-x:scroll;">
                    <div class="row flex-row flex-nowrap">
                        @foreach ($images as $i)
                            @if ($images[0]->route != $i->route)
                                <div class="col-4 col-md-5 col-lg-3 col-xl-4 col-xxl-3 d-flex justify-content-center ">
                                    <a href="#">
                                        <div class="card">
                                            <img src="{{ asset('assets/' . $i->route) }}"
                                                class="card-img-top rounded-0 img-fluid" alt="..." width="120" heigth="120">
                                        </div>
                                    </a>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-3 row justify-content-center">
                <div class="col-10 col-md-9">
                    <h4 id="placeOrigin"> {{ $producto->origin }}</h4>
                    <h1 id="nameProduct" class="fw-bold">{{ $producto->name }}</h1>
                    <h4 id="descriptionProduct" class="fw-bold">{{ $producto->description }}</h4>
                    <div class="d-flex justify-content-between mt-3">
                        <!--<button type="button" class="btn btn-outline-dark col-2 d-block p-2"> <h3 class="my-0 py-0" >XS</h3></button>
                                <button type="button" class="btn btn-outline-dark col-2 d-block p-2"><h3 class="my-0 py-0">S</h3></button>
                                <button type="button" class="btn btn-outline-dark col-2 d-block p-2"><h3 class="my-0 py-0">M</h3></button>
                                <button type="button" class="btn btn-outline-dark col-2 d-block p-2"><h3 class="my-0 py-0">L</h3></button>
                                <button type="button" class="btn btn-outline-dark col-2 d-block p-2 rounded-3"><h3 class="my-0 py-0">XL</h3></button>
                                -->
                        @foreach ($sizes as $s)
                            <button type="button" class="btn btn-outline-dark col-2 d-block p-2 rounded-3">
                                <h3 class="my-0 py-0">{{ $s->size }}</h3>
                            </button>
                        @endforeach
                    </div>
                    <h1 id="price" class="mt-3">${{ $producto->price }}.00</h1>
                    @auth
                        <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"
                            onclick="location.href='{{ route('add.to.cart', $producto->id) }}'">
                            <h4 class="my-0 py-0">A??adir al carrito</h4>
                        </button>
                    @else
                        <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"
                            onclick="location.href='{{ route('login') }}'">
                            <h4 class="my-0 py-0">A??adir al carrito</h4>
                        </button>
                        @endif
                        <div class=" border border-3 rounded-3 border-dark p-2 mt-5">
                            <p class="fw-bold">Acerca del lugar de origen</p>
                            <p>{{ $producto->origin }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <h3 class="fw-bold">Tus ??ltimas visitas</h3>
            <div class="container-fluid" style="overflow-x:scroll;">
                <div class="row flex-row flex-nowrap">
                    @foreach ($productos as $lastView)
                        <div class="col-4 col-md-5 col-lg-3 d-flex justify-content-center ">
                            <a href="/producto/{{ $lastView->id }}" class="text-decoration-none">
                                <div class="card">
                                    @foreach ($imgAdd as $ia)
                                        @if ($ia->product_id === $lastView->id)
                                            <img src="{{ asset('assets/' . $ia->route) }}"
                                                class="card-img-top rounded-0 img-fluid" alt="...">
                                        @endif
                                    @endforeach
                                    <div class="card-body">
                                        <h5 class="fw-bold card-text text-center">{{ $lastView->name }}</h5>
                                        <h4 class="fw-bold card-text text-center"> ${{ $lastView->price }}.00 </h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endsection
