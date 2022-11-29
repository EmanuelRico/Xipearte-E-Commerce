@extends('layouts.appAdmin')

@section('title',"Xipearte")

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-9 col-md-6 mt-3">
                <h3 class="fw-bold">Bienvenido al panel de control</h3>
        </div>
        <div class="col-1"></div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <h4 class="col-9 d-flex  my-4 fw-bold">Últimos pedidos</h4>
    </div>

    <div class="row">
        <div class="col-1">

        </div>
        <div class="col-10">

            <div class=" mx-auto py-3 shadow-lg  border border-3 rounded-3 border-dark p-2 hscroll" style="overflow-x:scroll;">

                <div class="row flex-row flex-nowrap">

                    @foreach ($sales as $s)

                        <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-xs-12 d-flex justify-content-center">
                            <div class="card shadow" style="width: 16rem;">
                                <div value="Revisar detalles de Pedido" id=<?php echo $s->id; ?> class="detalles btn">
                                
                                    <img src="{{ asset($s->sold_product->first()->product->imagenes->first()->route) }}" class="card-img-top img-fluid" alt="...">
                                    <div class="card-body">
                                        <p class="card-text d-flex justify-content-center fw-bold h5 ">{{$s->user->nombre}}</p>
                                        <h5 class="d-flex justify-content-center">{{Carbon\Carbon::parse($s->created_at)->format('d/m/Y')}}</h5>
                                        <h5 class="d-flex justify-content-center">${{floatval($s->total)}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
                
            </div>

        </div>
    </div>
    @if ($sales->isEmpty())

    @else

    <div class="modal fade" id="pedido-Modal" role="dialog" tabindex="-1" aria-labelledby="pedido-Modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" style="font-size:22px" id="verPedidoLabel" >Ver pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 for="" style="font-size:18px">Usuario</h5>
                    <p id="IDOrder"></p>
                    <br>
                    <p id="numeroOrden"></p>
                    <h5 for="" style="font-size:18px">Productos</h5>
                    <div class="table-responsive hscroll mb-3">
                        <table class="m-auto table-condensed table">
                            <thead>
                                <tr>
                                    <th style="width:40%">Nombre de Producto</th>
                                    <th style="width:10%">Cantidad</th>
                                    <th style="width:15%">Talla</th>
                                    <th style="width:15%">Precio unitario</th>
                                    <th style="width:20%">Precio total</th>
                                </tr>
                            </thead>
                            <tbody id="productos">
                            </tbody>
                        </table>
                    </div>

                    <p id="mostrarGuia"></p>
                    <form id="addRastreo" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="guia" class="form-label font-weight-normal">Número de rastreo</label>
                            <input name="guia" type="text" class="form-control border-dark border-2"
                                style="background-color: white" id="guia" aria-describedby="basic-addon3"
                                placeholder="Número de rastreo" aria-label="Nombre..." required>
                        </div>
                        <div class="col-12">
                            <div class="form-group mb-3">
                                <label for="paqueteria">Paquetería</label>
                                <select name="paqueteria" id="paqueteria" class="form-control border-dark border-2" style="background-color: white" id="exampleFormControlTextarea1" rows="6" required>
                                    <option value="">Seleccione una</option>  
                                    <option value="FEDEX">FedEx</option>  
                                    <option value="DHL">DHL</option>
                                    <option value="Estafeta">Estafeta</option>
                                    <option value="J&T Express">J&T Express</option>
                                    <option value="Correos de Mexico">Correos de México</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark col-12 d-block  rounded-3 mt-3 mb-3">
                            <h4 class="my-0 py-0">Guardar guía</h4>
                        </button>
                    </form>
                    <br>
                    <h5 for="" style="font-size:18px">Precio Total</h5>
                    <p id="pago"></p>
                    <br>
                    </p>
                    <br>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection


@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="{{asset('DataTables/datatables.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '.detalles', function(){
                var order_id = $(this).attr('id');
                console.log(order_id);
                //$('#pedido-Modal').modal('show');
                $.ajax({
                    method:"GET",
                    //url:'{{URL::to("/detalles/2")}}',
                    url:"/detalles/"+order_id,
                    success: function(response){
                        $('#IDOrder').html(response[0].sale.user.name +' / '+response[0].sale.user.email);
                        $('#numeroOrden').html(order_id);
                        console.log(response);
                       // $("#productos").append(<table>);
                        response.forEach(element => {
                            $("#productos").append("<tr><td>"+element.product.name+"</td><td>"+element.cantidad+"</td><td>"+element.size+"</td><td>$"+element.price+"</td><td>$"+element.final_price+"</td></tr>");
                        });
                        console.log(response[0].sale.guiaRastreo );
                        if(response[0].sale.guiaRastreo !== null){
                            $('#addRastreo').hide();
                            $('#mostrarGuia').html('Guía de rastreo: '+response[0].sale.guiaRastreo +' <br> '+ 'Paquetería: ' +response[0].sale.paqueteria);
                        }else{
                            $('#addRastreo').show();
                            $('#mostrarGuia').html('');
                        
                        }
                        
                        $('#pago').html('$'+response[0].sale.total);
                        $('#pedido-Modal').modal('show');
                    },
                })
            })
    
            $("#pedido-Modal").on("hidden.bs.modal", () => {
                $("#productos").html("")
            });
        });
    
    </script>

    <script>
        $(document).ready(function () {
            $('#tablaPedidos').DataTable( {
            ordering: true,
            language: {
            lengthMenu: 'Mostrando _MENU_ pedidos por página',
            zeroRecords: 'No se encontro ninguna coincidencia',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'No hay pedidos',
            infoFiltered: '(Filtrados de _MAX_ pedidos totales)',
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
            } );
        });
    </script>

    <script>
        $(function(){
            $("#addRastreo").on("submit",function(e){
                e.preventDefault();
                var id = document.getElementById('numeroOrden').textContent;
                console.log(id);
                var action = '/guiaRastreo/'+id;
                var method = $(this).attr("method");
                var form_data = new FormData($(this)[0]);
                var form = $(this);
                $.ajax({
                    url:action,
                    dataType:'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: method,
                    success: function(response) {
                        
                        location.href = "/panelControl";
                    },
                    error: function(response){

                    },
                })
            });
        });
    </script>
@endpush