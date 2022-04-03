@extends('layouts.app')

@section('title',"Xipearte")

@section('content')
<div class="container">
        <div class="row  " >
            <div class="col-12 col-md-6 mt-3">
                

                
                <div>
                    <img class="w-100 float-end"  src="{{ asset('assets/vestido.png') }}" >
                </div>
                
                <div class="container-fluid pt-4" style="overflow-x:scroll;">
                    <div class="row flex-row flex-nowrap">
                        <div class="col-3 d-flex justify-content-center ">
                            <a href="">
                                <div class="card " style="width: 7rem;">
                                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top rounded-0" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <a href="">
                                <div class="card " style="width: 7rem;">
                                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top rounded-0" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <a href="">
                                <div class="card " style="width: 7rem;">
                                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top rounded-0" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <a href="">
                                <div class="card " style="width: 7rem;">
                                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top rounded-0" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <a href="">
                                <div class="card " style="width: 7rem;">
                                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top rounded-0" alt="...">
                                </div>
                            </a>
                        </div>
                        <div class="col-3 d-flex justify-content-center">
                            <a href="">
                                <div class="card " style="width: 7rem;">
                                    <img src="{{ asset('assets/vestido.png') }}" class="card-img-top rounded-0" alt="...">
                                </div>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="col-12 col-md-6 mt-3 row justify-content-center">
                <div class="col-10 col-md-9">
                    <h4 id="placeOrigin"> Zinacantan, Chiapas</h4>
                    <h1 id="nameProduct" class="fw-bold">Vestido en manta</h1>
                    <h4 id ="descriptionProduct" class="fw-bold">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cupiditate pariatur excepturi unde voluptatem rem consectetur dolorem ut. Ullam officiis, ut dolore delectus perferendis asperiores! Assumenda omnis voluptatum atque nisi repudiandae.</h4>
                    <div class="d-flex justify-content-between mt-3">
                        <button type="button" class="btn btn-outline-dark col-2 d-block p-2"> <h3 class="my-0 py-0" >XS</h3></button>
                        <button type="button" class="btn btn-outline-dark col-2 d-block p-2"><h3 class="my-0 py-0">S</h3></button>
                        <button type="button" class="btn btn-outline-dark col-2 d-block p-2"><h3 class="my-0 py-0">M</h3></button>
                        <button type="button" class="btn btn-outline-dark col-2 d-block p-2"><h3 class="my-0 py-0">L</h3></button>
                        <button type="button" class="btn btn-outline-dark col-2 d-block p-2 rounded-3"><h3 class="my-0 py-0">XL</h3></button>
                    </div>
                    <h1 id="price"class="mt-3">$000.00</h1>
                    <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3"> <h4 class="my-0 py-0">Añadir al carrito</h4></button>
                    <div class=" border border-3 rounded-3 border-dark p-2 mt-5"> 
                        <p class="fw-bold" >Acerca del lugar de origen</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio impedit repellat amet blanditiis sint consectetur. Eos deserunt, quo eligendi, asperiores perspiciatis, animi porro eum ipsa sit accusantium fuga molestiae exercitationem.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container mt-5">
    <h3 class="fw-bold"> A otras personas también les interesó//Tus últimas visitas</h3>
    <div class="container-fluid" style="overflow-x:scroll;">
        <div class="row flex-row flex-nowrap">
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 14rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bold card-text text-center" >Vestido en manta</h5>
                            <h4 class="fw-bold card-text text-center" > $000.00 </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 14rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bold card-text text-center" >Vestido en manta</h5>
                            <h4 class="fw-bold card-text text-center" > $000.00 </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 14rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bold card-text text-center" >Vestido en manta</h5>
                            <h4 class="fw-bold card-text text-center" > $000.00 </h4>    
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 14rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bold card-text text-center" >Vestido en manta</h5>
                            <h4 class="fw-bold card-text text-center" > $000.00 </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 14rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bold card-text text-center" >Vestido en manta</h5>
                            <h4 class="fw-bold card-text text-center" > $000.00 </h4>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-3 d-flex justify-content-center">
                <a href="">
                    <div class="card " style="width: 14rem;">
                        <img src="{{ asset('assets/vestido.png') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="fw-bold card-text text-center" >Vestido en manta</h5>
                            <h4 class="fw-bold card-text text-center" > $000.00 </h4>    
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
