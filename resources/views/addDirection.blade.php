@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')


    <div class="container">

        <form action="#" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-md-center ">

                <div class="col col-lg-8">
                    <h2 class="fw-bold pt-4 pb-4">Dirección del pedido</h2>
                    <h3 class="fw-bold pt-4 pb-4">Dirección</h3>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Calle</label>
                        <input type="text" name="street" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Número exterior</label>
                        <input type="text" name="exteriorNumber" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" required></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Número interior</label>
                        <input type="text" name="interiorNumber" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" ></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Colonia:</label>
                        <input type="text" name="colonia" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" ></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Código Postal</label>
                        <input type="number" name="postalCode" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" ></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Referencias:</label>
                        <textarea name="references" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" ></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Municipio</label>
                        <input type="text" name="municipio" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" ></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Estado</label>
                        <input type="text" name="state" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" ></textarea>
                    </div>
                    
                    
                    <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3">
                        <h4 class="my-0 py-0">Continuar</h4>
                    </button>

                </div>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/addProduct.js') }}"></script>
@endsection
