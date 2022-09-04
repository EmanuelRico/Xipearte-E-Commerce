@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')


    <div class="container">

        
            <div class="row justify-content-md-center ">

                <div class="col col-lg-8">
                    <h2 class="fw-bold pt-4 pb-4">Dirección del pedido</h2>
                    <form action="/saveAdd" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf 
                        <div class="form-group mb-3">
                            <label for="">Calle</label>
                            <input type="text" id="street" name="street" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="3" required>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Número exterior</label>
                                    <input type="text" id="extNum" name="exteriorNumber" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Número interior</label>
                                    <input type="text" id="intNum" name="interiorNumber" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" >
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Código Postal</label>
                                    <input type="number" id="cp" name="postalCode" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6">
                                </div>
                            </div>

                        </div>

                        <div class="form-group mb-3">
                            <label for="">Colonia</label>
                            <input type="text" id="col" name="colonia" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" >
                        </div>

                        

                        <div class="form-group mb-3">
                            <label for="">Entre calles</label>
                            <input name="references" id="ref" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" ></input>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Estado</label>
                                        <select name="state " id="est" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" >
                                            <option >Seleccione uno...</option>
                                            <option value="1">Aguascalientes</option>
                                            <option value="2">Baja California</option>
                                            <option value="3">Baja California Sur</option>
                                            <option value="4">Campeche</option>
                                            <option value="5">Chiapas</option>
                                            <option value="6">Chihuahua</option>
                                            <option value="7">Ciudad de México</option>
                                            <option value="8">Coahuila</option>
                                            <option value="9">Colima</option>
                                            <option value="10">Durango</option>
                                            <option value="11">Estado de México</option>
                                            <option value="12">Guanajuato</option>
                                            <option value="13">Guerrero</option>
                                            <option value="14">Hidalgo</option>
                                            <option value="15">Jalisco</option>
                                            <option value="16">Michoacán</option>
                                            <option value="17">Morelos</option>
                                            <option value="18">Nayarit</option>
                                            <option value="19">Nuevo León</option>
                                            <option value="20">Oaxaca</option>
                                            <option value="21">Puebla</option>
                                            <option value="22">Querétaro</option>
                                            <option value="23">Quintana Roo</option>
                                            <option value="24">San Luis Potosí</option>
                                            <option value="25">Sinaloa</option>
                                            <option value="26">Sonora</option>
                                            <option value="27">Tabasco</option>
                                            <option value="28">Tamaulipas</option>
                                            <option value="29">Tlaxcala</option>
                                            <option value="30">Veracruz</option>
                                            <option value="31">Yucatán</option>
                                            <option value="32">Zacatecas</option>
                                        </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Municipio</label>
                                    <input type="text" name="municipio" id="mun" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" >
                                </div>
                            </div>
                        </div>

                        <button type="submit" id="btn" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3">
                            <h4 class="my-0 py-0">Continuar</h4>
                        </button>
                    </form>
                </div>
            </div>
        
    </div>

    <!-- <script src="">
        const saveAdd = (ev) => {
            ev.preventDefault();
            let address = {
                street: document.getElementById('street').value,
                extNum: document.getElementById('extNum').value,
                intNum: document.getElementById('intNum').value,
                colony: document.getElementById('col').value,
                cp: document.getElementById('cp').value,
                ref: document.getElementById('ref').value,
                mun:document.getElementById('mun').value,
                estate: document.getElementById('est').value,
            }
            info = JSON.stringify(address);
            console.log(info);
        }

        document.addEventListener('DOMContentLoaded',()=>{ 
            document.getElementById('btn').addEventListener('click', saveAdd);
        })
        // $.ajax({
        //         url: '{{ route('update.cart') }}',
        //         method: "PATCH",
        //         data: {
        //             _token: '{{ csrf_token() }}', 
        //             id: ele.parents("tr").attr("data-id"), 
        //             quantity: ele.parents("tr").find(".quantity").val()
        //         },
        //         success: function (response) {
        //         window.location.reload();
        //         }
        //     });
    </script> -->
@endsection
