@extends('layouts.appAdmin')

@section('title', 'Editar Categorías')

@section('content')
  @if(Session::has('message'))
  <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
      <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
      <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
  </div>
  @endif
    <div class="container d-flex justify-content-around flex-wrap">
        <h2 class="fw-bold pt-4 pb-3 w-100">Categorías disponibles</h2>
        @foreach ($category as $c)
            <div class="card mt-3 border border-dark border-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">{{ $c->name }}</h5>
                    <p class="card-text mb-5 text-center">{{ $c->description }}</p>
                    <div class="position-absolute bottom-0 mb-2">
                        <a href="/editarCategoria/{{ $c->id }}" class="btn btn-primary">Editar</a>
                        <button type="button" class="btn"  style="background-color: rgb(192, 192, 192)"data-bs-toggle="modal" data-bs-target="#exampleModal{{$c->id}}">
                          Eliminar
                        </button>
                    </div>
                </div>
            </div>
            {{-- modal --}}
            <div class="modal fade" id="exampleModal{{$c->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de eliminar la categoría?</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <form action="/eliminarCategoria" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $c->id }}">
                        <button type="submit" class="btn btn-primary">Sí</button>
                    </form>
                      
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
    <div class="container d-flex justify-content-around flex-wrap mt-5">
      {{ $category->links() }}
  </div>
@endsection
