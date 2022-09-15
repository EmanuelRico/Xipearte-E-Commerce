@extends('layouts.app')

@section('title', $categoryName)
@section('content')
<div class="container d-flex justify-content-around flex-wrap">
    <h2 class="fw-bold pt-4 pb-3 w-100">{{$categoryName}} </h2>
    @php
        $name = "";
    @endphp

    @foreach ($category as $p)
        @if ($name != $p->product->name)
            <div class="card mt-3 shadow" style="width: 18rem;">
                <a href="/producto/{{$p->product->id}}"  class="text-decoration-none">
                
                    <div class="d-flex justify-content-center">
                        @if($p->product->imagenes->count()>0)
                            <img src='{{ asset("assets/".$p->product->imagenes->first()->route) }}' class="img-fluid rounded mt-3"
                                style="max-width: 200px; max-height: 207px" alt="...">
                        @else
                            <img src='https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg' class="img-fluid rounded mt-3"
                                style="max-width: 200px; max-height: 207px" alt="...">
                        @endif
                        
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $p->product->name }}</h5>
                        <p class="card-text mb-3 text-center">{{ $p->product->description }}</p>
                        <h6 class="card-subtitle d-flex justify-content-center">${{ $p->product->price }}</h5>   
                    </div>
                </a>
            </div>
       
        @endif
        @php
            $name = $p->product->name;
        @endphp
    @endforeach

    <div class="container d-flex justify-content-around flex-wrap mt-5">
        {{ $category->links() }}
    </div>
</div>
@endsection