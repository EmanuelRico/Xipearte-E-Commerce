@extends('layouts.app')

@section('title', 'Xipearte')

@section('css')
    <style>
        .active{
  border: 3px solid;
  border-color:black;
}
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @if($producto->imagenes->count()>0)
                

                    <div class="col-12 col-md-5 mt-3">

                        <div>
                            <img class="w-100  mx-auto d-block pro-img"  src="{{ asset('assets/' . $producto->imagenes->first()->route) }} " style="max-width:400px">
                        </div>

                        <div class="container-fluid pt-4" style="overflow-x:scroll;">
                            
                                <div class="thumb-img row flex-row flex-nowrap">
                                @foreach ($producto->imagenes as $i)
                                    @if($i->id == $producto->imagenes->first()->id)
                                        <div class="box active col-4 col-md-5 col-lg-3 col-xl-4 col-xxl-3 d-flex justify-content-center mx-3" onclick="changeImage(this)">
                                            <img src="{{ asset('assets/' . $i->route) }}"
                                                class="card-img-top rounded-0 img-fluid" >
                                        </div>
                                    @else
                                        <div class="box col-4 col-md-5 col-lg-3 col-xl-4 col-xxl-3 d-flex justify-content-center mx-3" onclick="changeImage(this)">
                                            <img src="{{ asset('assets/' . $i->route) }}"
                                                class="card-img-top rounded-0 img-fluid" >
                                        </div>
                                    @endif 
                                @endforeach
                            </div>
                            
                        </div>
                    </div>

                    
                
            @else
                
                    <div class="col-12 col-md-5 mt-3">
                        <div>
                            <img class="w-100  mx-auto d-block pro-img"  src="https://kangsblackbeltacademy.com/wp-content/uploads/2017/04/default-image.jpg" style="max-width:400px">
                        </div>
                    </div>
                
            @endif
            <div class="col-12 col-md-7 mt-3 row justify-content-center">
                <div class="col-10 col-md-9">
                    <h4 id="placeOrigin"> {{ $producto->origin }}</h4>
                    <h1 id="nameProduct" class="fw-bold">{{ $producto->name }}</h1>
                    <h4 id="descriptionProduct" class="fw-bold">{{ $producto->description }}</h4>
                    <div class="d-flex justify-content-between mt-3">
                        @foreach ($sizes as $s)
                            <button type="button" class="btn btn-outline-dark col-2 d-block p-2 rounded-3">
                                <h3 class="my-0 py-0">{{ $s->size }}</h3>
                            </button>
                        @endforeach
                    </div>
                    <h1 id="price" class="mt-3">${{ $producto->price }}.00</h1>
                    @auth
                        <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"
                            onclick="location.href='{{ route('add.to.cart', $producto->id) }}'">
                            <h4 class="my-0 py-0">Añadir al carrito</h4>
                        </button>
                    @else
                        <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"
                            onclick="location.href='{{ route('login') }}'">
                            <h4 class="my-0 py-0">Añadir al carrito</h4>
                        </button>
                        @endif
                        <div class=" border border-3 rounded-3 border-dark p-2 mt-5">
                            <p class="fw-bold">Acerca del lugar de origen</p>
                            <p>{{ $producto->originDescription }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container mt-5">
            <h3 class="fw-bold">Tus últimas visitas</h3>
            <div class="container-fluid  shadow-lg hscroll" style="overflow-x:scroll;">
                <div class="row flex-row flex-nowrap">
                    @foreach ($productos as $lastView)
                        <div class="col-4 col-md-5 col-lg-3 d-flex justify-content-center ">
                            <a href="/producto/{{ $lastView->id }}" class="text-decoration-none">
                                <div class="card text-center">
                                    @foreach ($lastView->imagenes as $ia)
                                            <img src="{{ asset('assets/' . $ia->route) }}"
                                                class="card-img-top rounded-0 img-fluid mx-auto d-block" style="min-height:300px;max-height: 300px;max-width:225px" alt="...">
                                    @endforeach
                                    <div class="card-body">
                                        <h5 class="fw-bold card-text text-center text-truncate">{{ $lastView->name }}</h5>
                                        <h4 class="fw-bold card-text text-center"> ${{ $lastView->price }}.00 </h4>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    @endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        const thumbs = document.querySelector(".thumb-img").children;
        console.log(thumbs);
        function changeImage(event){
            document.querySelector('.pro-img').src =  event.children[0].src;
            for(let i=0;i<thumbs.length;i++){
                thumbs[i].classList.remove("active")
            }
            event.classList.add("active");
        }
    </script>
@endpush
