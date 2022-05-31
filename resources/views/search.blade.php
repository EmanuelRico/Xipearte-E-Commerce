@extends('layouts.app')

@section('title', 'Resultado de: '.$coinci)
@section('content')
<div class="container d-flex justify-content-around flex-wrap">
    <h2 class="fw-bold pt-4 pb-3 w-100">Resultados de la búsqueda: {{$coinci}} </h2>
    @php
        $name = "";
    @endphp
    @if($productos === [])
        <h3>No se encontraron resultados para su búsqueda</h3>
    @endif
    @foreach ($productos as $p)
        @if ($name != $p->name)
            
        <a href="/producto/{{$p->id}}"  class="text-decoration-none">
            <div class="card mt-3 border border-dark border-2" style="width: 18rem;">
                <div class="d-flex justify-content-center">
                    @foreach($images as $i)
                        @if($i->product_id === $p->id)
                            <img src='{{ asset("assets/".$i->route) }}' class="img-fluid mt-1"
                            style="max-width: 200px; max-height: 207px" alt="...">
                        @endif
                    @endforeach
                </div>
                <div class="card-body">
                    <h5 class="card-title">Producto: {{ $p->name }}</h5>
                    <h6 class="card-subtitle">Precio: ${{ $p->price }}.00</h5>
                        <p class="card-text mb-5">Descripción: {{ $p->description }}</p>
                        
                </div>
            </div>
            </a>
        @endif
        @php
            $name = $p->name;
        @endphp
    @endforeach
</div>
@endsection