@extends('layouts.app')

@section('title', 'Xipearte Categorias')
@section('content')
    <div class="container d-flex justify-content-around flex-wrap">
        <h2 class="fw-bold pt-4 pb-3 w-100">Categorías disponibles</h2>
        @foreach ($category as $c)
            <div class="card mt-3 shadow" style="width: 18rem;">
                <a href="/categoria/{{$c->id}}" style="text-decoration:none">
                    <div class="card-body">
                        <h5 class="card-title d-flex justify-content-center">{{ $c->name }}</h5>
                        <p class="card-text text-center">{{ $c->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach

    </div>
    <div class="container d-flex justify-content-around flex-wrap mt-5">
        {{ $category->links() }}
    </div>
@endsection
