@extends('layouts.appAdmin')

@section('title', 'Editar Categorías')

@section('content')


    <div class="container d-flex justify-content-around flex-wrap">
        <h2 class="fw-bold pt-4 pb-3 w-100">Categorías disponibles</h2>
        @foreach ($category as $c)
            <div class="card mt-3 border border-dark border-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Categoría: {{ $c->name }}</h5>
                    <p class="card-text mb-5">Descripción: {{ $c->description }}</p>
                    <div class="position-absolute bottom-0 mb-2">
                        <a href="/editarCategoria/{{ $c->id }}" class="btn btn-primary">Editar</a>
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
                  <h5 class="modal-title" id="exampleModalLabel"> ¿Estás seguro de eliminar la categoría?</h5>
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
