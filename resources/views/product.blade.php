@extends('layouts.app')
@section('title',$p->name)

@section('content')
<div class="container">
    @foreach ($images as $i)
        <p>{{$i->id}}</p>
    @endforeach
    @foreach ($sizes as $s)
        <button type="button" class="btn btn-outline-dark">{{$s->size}}</button>
    @endforeach
    <div class="row ">
        <div class="col-12 col-md-6 mt-3">
        <div class="container-fluid" style="overflow-x:scroll;">
    <div class="row flex-row flex-nowrap">
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-3 d-flex justify-content-center">
            <a href="">
                <div class="card " style="width: 18rem;">
                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div> 
        </div>
        <div class="col-12 col-md-6 mt-3 row justify-content-center">
            <div class="col-10 col-md-9">
                <h4 id="placeOrigin"> Zinacantan, Chiapas</h4>
                <h1 id="nameProduct">Vestido en manta</h1>
                <p id ="descriptionProduct">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate pariatur excepturi unde voluptatem rem consectetur dolorem ut. Ullam officiis, ut dolore delectus perferendis asperiores! Assumenda omnis voluptatum atque nisi repudiandae.</p>
                <div>
                    <button type="button" class="btn btn-outline-dark">XS</button>
                    <button type="button" class="btn btn-outline-dark">S</button>
                    <button type="button" class="btn btn-outline-dark">M</button>
                    <button type="button" class="btn btn-outline-dark">L</button>
                    <button type="button" class="btn btn-outline-dark">XL</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection