@extends('layouts.app')

@section('title', 'Editar Productos')

@section('content')
    <div class="container d-flex justify-content-around flex-wrap">
        <h2 class="fw-bold pt-4 pb-3 w-100">Productos disponibles</h2>
        @php
            $name = '';
        @endphp
        @foreach ($product as $p)
            @if ($name != $p->name)
                <!-- -->
                <div class="col-xxl-3 col-xl-4 col-lg-5 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center mb-4">
                    <a href="/producto/{{ $p->id }}" class="text-decoration-none">
                        <div class="card shadow" style="max-width: 18rem;">
                            @if($p->imagenes->count()>0)
                                <img src='{{ asset($p->imagenes->first()->route) }}' class="img-fluid mt-0 rounded"
                                    style="min-height: 380px;min-width:200px" alt="...">
                            @else
                                <img src='https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg' class="img-fluid mt-0 rounded"
                                    style="min-height: 380px;min-width:200px" alt="...">
                            @endif
                            <div class="card-body">
                                <p class="card-title text-center fw-bold h5 text-truncate">{{ $p->name }}</p>
                                <h3 class=" card-text d-flex justify-content-center">${{ $p->price }}</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="card mt-3 shadow" style="width: 18rem;">
                    <a href="producto/{{ $p->id }}" class="text-decoration-none">
                        <div class="d-flex justify-content-center">
                            @if($p->imagenes->count()>0)
                                <img src='{{ asset($p->imagenes->first()->route) }}' class="img-fluid mt-3 rounded"
                                    style="max-width: 200px; max-height: 207px" alt="...">
                            @else
                                <img src='https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg' class="img-fluid mt-3 rounded"
                                    style="max-width: 200px; max-height: 207px" alt="...">
                            @endif
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $p->name }}</h5>
                            <p class="card-text mb-3 d-flex justify-content-center">{{ $p->description }}</p>
                            <h6 class="card-subtitle d-flex justify-content-center">${{ $p->price }}</h6>
                        </div>
                    </a>
                </div> -->
            @endif
            @php
                $name = $p->name;
            @endphp
        @endforeach

    </div>
    <div class="container d-flex justify-content-around flex-wrap mt-5">
        {{ $product->links() }}
    </div>
@endsection
