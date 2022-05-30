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

    <div class=" mx-5 py-3 shadow-lg  border border-3 rounded-3 border-dark p-2 hscroll" style="overflow-x:scroll;">
        <div class="row flex-row flex-nowrap">
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                <a href="/producto/1"  class="text-decoration-none">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text d-flex justify-content-center fw-bold h5 ">Fernando Rodríguez</p>
                            <h5 class="d-flex justify-content-center">05/05/2022</h5>
                            <h5 class="d-flex justify-content-center">$000.00</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                <a href="/producto/1"  class="text-decoration-none">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text d-flex justify-content-center fw-bold h5 ">Fernando Rodríguez</p>
                            <h5 class="d-flex justify-content-center">05/05/2022</h5>
                            <h5 class="d-flex justify-content-center">$000.00</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                <a href="/producto/1"  class="text-decoration-none">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text d-flex justify-content-center fw-bold h5 ">Fernando Rodríguez</p>
                            <h5 class="d-flex justify-content-center">05/05/2022</h5>
                            <h5 class="d-flex justify-content-center">$000.00</h5>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                <a href="/producto/1"  class="text-decoration-none">
                    <div class="card shadow" style="width: 18rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top img-fluid" alt="...">
                        <div class="card-body">
                            <p class="card-text d-flex justify-content-center fw-bold h5 ">Fernando Rodríguez</p>
                            <h5 class="d-flex justify-content-center">05/05/2022</h5>
                            <h5 class="d-flex justify-content-center">$000.00</h5>
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <a href="/añadirProducto">
                <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"> 
                    <h4 class="my-0 py-0">Añadir producto</h4>
                </button>  
            </a>    
        </div>
        <div class="col-5">
            <a href="/administrarProductos">
                <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"> 
                    <h4 class="my-0 py-0">Administrar productos</h4>
                </button>
            </a> 
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <a href="/administrarCategorias">
                <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"> 
                    <h4 class="my-0 py-0">Administrar categorías</h4>
                </button>
            </a> 
        </div>
        <div class="col-5">
            <a href="/nuevaCategoria">
            <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"> 
                <h4 class="my-0 py-0">Añadir nueva categoría</h4>
            </button>
            </a> 
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-5">
            <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"> 
                <h4 class="my-0 py-0">Administrar pedidos</h4>
            </button>      
        </div>
        
    </div>

</div>
@endsection