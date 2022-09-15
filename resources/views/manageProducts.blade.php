@extends('layouts.appAdmin')

@section('title', 'Editar Productos')

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
        </div>
    @endif
    
    <div class="container d-flex justify-content-around flex-wrap">
        <h2 class="fw-bold pt-4 pb-3 w-100">Productos disponibles</h2>
        @php
            $name = '';
        @endphp
        @foreach ($product as $p)
            @if ($name != $p->name)
                <div class="card mt-3 shadow" style="width: 18rem;">
                    <div class="d-flex justify-content-center">
                        @if($p->imagenes->count()>0)
                            <img src='{{ asset("assets/".$p->imagenes->first()->route) }}' class="img-fluid mt-3 rounded"
                            style="max-width: 200px; max-height: 207px" alt="...">
                        @else
                            <img src='https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg' class="img-fluid mt-3 rounded"
                            style="max-width: 200px; max-height: 207px" alt="...">
                        @endif
                        
                    </div>
                    <div class="card-body ">
                        <h5 class="card-title text-center">{{ $p->name }}</h5>
                        <h6 class="card-subtitle text-center">$ {{ $p->price }}</h6>
                            <p class="card-text mb-5 text-center">{{ $p->description }}</p>
                            <div class="position-absolute d-flex justify-content-center bottom-0 mb-2 w-100 ">
                                <a href="/editarProducto/{{ $p->id }}" class="btn btn-primary me-3">Editar</a>
                                <button type="button" class="btn me-3" style="background-color: rgb(192, 192, 192)"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal{{ $p->id }}">
                                    Eliminar
                                </button>
                            </div>
                    </div>
                </div>
                {{-- modal --}}
                <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de eliminar el producto?
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form action="/eliminarProducto" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $p->id }}">
                                    <button type="submit" class="btn btn-primary">Sí</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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
