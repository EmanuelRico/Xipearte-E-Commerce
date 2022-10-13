@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')


    <div class="container">

            <div class="row justify-content-md-center ">

                <div class="col col-lg-8">

                    <div class="position-relative m-4">
                        <div class="progress" style="height: 1px;">
                          <div class="progress-bar" role="progressbar" aria-label="Progress" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                        <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                        <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                      </div>

                    <h2 class="fw-bold pt-4 pb-4">Dirección del pedido</h2>
                    <form action="/saveAdd" method="POST" enctype="multipart/form-data" autocomplete="off">
                        @csrf 
                        <div class="form-group mb-3">
                            <label for="">Calle</label>
                            <input type="text" id="street" name="street" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="3" required>
                        </div>

                        <div class="row align-items-end">
                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Número exterior</label>
                                    <input type="number" id="extNum" name="exteriorNumber" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" required>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Número interior</label>
                                    <input type="number" id="intNum" name="interiorNumber" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" >
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group mb-3">
                                    <label for="">Código Postal</label>
                                    <input type="number" id="cp" name="postalCode" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" required>
                                </div>
                            </div>

                        </div>

                        <div class="form-group mb-3">
                            <label for="">Colonia</label>
                            <input type="text" id="col" name="colonia" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" required>
                        </div>

                        

                        <div class="form-group mb-3">
                            <label for="">Entre calles</label>
                            <input name="references" id="ref" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" required></input>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="est">Estado</label>
                                    <select name="state" id="est" class="form-control border-dark border-2" style="background-color: white" id="exampleFormControlTextarea1" rows="6" required>
                                        <option value="">Seleccione uno...</option>    
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Ciudad de México">Ciudad de México</option>
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Estado de México">Estado de México</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group mb-3">
                                    <label for="">Municipio</label>
                                    <input type="text" name="municipio" id="mun" class="form-control border-dark border-2" style="background-color: white"
                                        id="exampleFormControlTextarea1" rows="6" required>
                                </div>
                            </div>
                        </div>

                        <button type="submit" value="Submit" id="btn" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3">
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
