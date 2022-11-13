@extends('layouts.appAdmin')

@section('title',"Xipearte")

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-9 col-md-6 mt-3">
                <h3 class="fw-bold">Bienvenido al panel de control</h3>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <h4 class="col-9 d-flex  my-4 fw-bold">Últimos pedidos</h4>
    </div>

    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">

            <div class=" mx-auto py-3 shadow-lg  border border-3 rounded-3 border-dark p-2 hscroll" style="overflow-x:scroll;">

                <div class="row flex-row flex-nowrap">

                    @foreach ($sales as $s)

                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                            <div class="card shadow" style="width: 13rem;">
                                <a href="/pedidosA"  class="text-decoration-none">
                                
                                    <img src="{{ asset($s->sold_product->first()->product->imagenes->first()->route) }}" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <p class="card-text d-flex justify-content-center fw-bold h5 ">{{$s->user->nombre}}</p>
                                        <h5 class="d-flex justify-content-center">{{Carbon\Carbon::parse($s->created_at)->format('d/m/Y')}}</h5>
                                        <h5 class="d-flex justify-content-center">${{floatval($s->total)}}</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                
            </div>

        </div>
    </div>

</div>
@endsection