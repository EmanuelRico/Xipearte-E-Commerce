@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')


    <div class="container">

        
            <div class="row justify-content-md-center ">

                <div class="col col-lg-8">
                    <h2 class="fw-bold pt-4 pb-4">Dirección del pedido</h2>
                    <h3 class="fw-bold pt-4 pb-4">Dirección</h3>
                    <form action="/saveAdd" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="form-group mb-3">
                            <label for="">Calle</label>
                            <input type="text" id="street" name="street" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Número exterior</label>
                            <input type="text" id="extNum" name="exteriorNumber" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" required></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Número interior</label>
                            <input type="text" id="intNum" name="interiorNumber" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" ></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Colonia:</label>
                            <input type="text" id="col" name="colonia" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" ></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Código Postal</label>
                            <input type="number" id="cp" name="postalCode" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" ></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Referencias:</label>
                            <textarea name="references" id="ref" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" ></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Municipio</label>
                            <input type="text" name="municipio" id="mun" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" ></textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Estado</label>
                            <input type="text" name="state" id="est" class="form-control border-dark border-2" style="background-color: white"
                                id="exampleFormControlTextarea1" rows="6" ></textarea>
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
