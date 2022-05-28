@extends('layouts.appAdmin')

@section('title', 'Editar Productos')

@section('content')
    <div class="container d-flex justify-content-around flex-wrap">
        <h2 class="fw-bold pt-4 pb-3 w-100">Productos disponibles</h2>
        @foreach ($product as $p)
            <div class="card mt-3 border border-dark border-2" style="width: 18rem;">
                <div class="d-flex justify-content-center">
                    <img src='{{ asset("assets/$p->route") }}' class="img-fluid mt-1" style="max-width: 200px; max-height: 207px" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Producto: {{ $p->name }}</h5>
                    <h6 class="card-subtitle">Price: {{ $p->price }}</h5>
                    <p class="card-text mb-5">Descripción: {{ $p->description }}</p>
                    <div class="position-absolute bottom-0 mb-2">
                        <a href="/editarProducto/{{ $p->id }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn " style="background-color: rgb(192, 192, 192)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Eliminar
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel"> ¿Estás seguro de eliminar el producto?</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                  <button type="button" class="btn btn-primary">Sí</button>
                </div>
              </div>
            </div>
          </div>
    </div>
@endsection
