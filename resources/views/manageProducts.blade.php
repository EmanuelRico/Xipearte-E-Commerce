@extends('layouts.appAdmin')

@section('title', 'Editar Productos')

@section('content')
    <div class="container">
        @foreach ($product as $p)
            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Producto: {{ $p->name }}</h5>
                    <h6 class="card-subtitle">Price: {{ $p->price }}</h5>
                    <p class="card-text">Descripción: {{ $p->description }}</p>
                    <a href="/editarProducto/{{ $p->id }}" class="btn btn-primary">Editar</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
