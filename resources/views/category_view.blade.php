@extends('layouts.app')

@section('title', $category->name)
@section('content')
<div class="container d-flex justify-content-around flex-wrap">
    <h2 class="fw-bold pt-4 pb-3 w-100">{{$category->name}} </h2>
    @php
        $name = "";
    @endphp
    @foreach ($products as $p)
        @if ($name != $p->name)
            
        <a href="/producto/{{$p->id}}"  class="text-decoration-none">
            <div class="card mt-3 border border-dark border-2" style="width: 18rem;">
                <div class="d-flex justify-content-center">
                    <img src='{{ asset("assets/$p->route") }}' class="img-fluid mt-1"
                        style="max-width: 200px; max-height: 207px" alt="...">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Producto: {{ $p->name }}</h5>
                    <h6 class="card-subtitle">Precio: {{ $p->price }}</h5>
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