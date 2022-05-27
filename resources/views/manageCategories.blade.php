@extends('layouts.appAdmin')

@section('title', 'Editar Categorías')

@section('content')


    <div class="container">

        @foreach ($category as $c)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Categoría: {{ $c->name }}</h5>
                    <p class="card-text">Descripción: {{ $c->description }}</p>
                    <a href="/editarCategoria/{{$c->id}}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
