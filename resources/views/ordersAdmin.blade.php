@extends('layouts.appAdmin')

@section('title',"Pedidos")

@section('css')
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css')}}">
@endsection

@section('content')

@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
    </div>
    @endif

<div class="mt-5">
    <div class="container" id="cuadro">
        <h2 class="fw-bold pt-4 pb-4">Pedidos</h2>
        <div class="table-responsive hscroll">
            <table id="tablaPedidos" class="table table-condensed display">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th>Dirección de Entrega</th>
                        <th style="width:5%">Total</th>
                        <th style="width:10%">Fecha</th>
                        <th style="width:20%">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                @if(!$orders->isEmpty())
                    @foreach ($orders as $order)
                        <tr>
                            <th >{{$order->id}}</th>
                            <th >{{$order->user->name}}</th>
                            <td >
                            @foreach (json_decode($order->direccion) as $key => $value)
                                @if($key == 'Codigo Postal')
                                {{ $value }}
                                @elseif ($key == 'Estado')
                                    {{ $value }}
                                @else
                                    {{ $value }}, 
                                @endif
                            @endforeach
                            </td>
                            <td>{{$order->total}}</td>
                            <td id="fecha">{{$order->created_at->toDateString()}}</td>
                            <td class="text-center">
                                <input type="button" value="Revisar detalles de Pedido" id=<?php echo $order->id; ?>   class="btn btn-primary detalles">
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table> 
        </div>
    </div>

    @if ($orders->isEmpty())

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
                        
                        location.href = "/pedidosA";
                    },
                    error: function(response){

                    },
                })
            });
        });
    </script>
@endpush