@extends('layouts.appAdmin')

@section('title', 'Editar Categoría')

@section('content')

    <div class="container">
        <form action="/actualizarCategoria" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $c->id }}">
            <div class="row justify-content-md-center">
                <div class="col col-lg-8">
                    <h2 class="fw-bold pt-4 pb-4">Editar categoría</h2>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label font-weight-normal">Nombre de la categoría</label>
                        <input value="{{ $c->name }}" id="categoryName" name="name" required type="text"
                            class="form-control border-dark border-2" id="basic-url" aria-describedby="basic-addon3"
                            placeholder="Nombre..." aria-label="Nombre...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Descripción de la categoria</label>
                        <textarea id="categoryDescription" required name="description" class="form-control border-dark border-2"
                            id="exampleFormControlTextarea1" rows="6">{{ $c->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3">
                        Editar categoría
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
