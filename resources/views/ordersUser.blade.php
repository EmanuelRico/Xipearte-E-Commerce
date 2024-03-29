@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css')}}">
@endsection

@section('content')

<div class="mt-5">
    <div class="container" id="cuadro">
        <div class="table-responsive hscroll">
            <table id="tablaPedidos" class="table table-condensed display">
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Total</th>
                        <th>Dirección de Entrega</th>
                        <th style="width:10%">Fecha Pedido</th>
                        <th style="width:20%">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                @if(!$orders->isEmpty())
                    @foreach ($orders as $order)
                        <tr>
                            <th scope="row">{{$order->id}}</th>
                            <td>{{$order->total}}</td>
                            <td class="">
                            @foreach (json_decode($order->direccion) as $key => $value)
                                @if($key == 'Codigo Postal')
                                @elseif ($key == 'Estado')
                                    {{ $value }}
                                @else
                                    {{ $value }}, 
                                @endif
                            @endforeach
                            </td>
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
                    <h5 class="modal-title fw-bold" style="font-size:22px" id="verPedidoLabel">Ver pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- <h5 for="" style="font-size:18px">ID de Pedido</h5>
                    <p id="IDOrder"></p>
                    <br> -->
                    <h5 for="" style="font-size:18px">Productos</h5>
                    <div class="table-responsive hscroll">
                        <table class="m-auto table table-condensed">
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
                    <br>
                    <p id="mostrarGuia"></p>
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

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="{{asset('dataTables/dataTables.min.js')}}"></script>

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
                            // $('#IDOrder').html(response.id);
                            console.log(response);
                            response.forEach(element => {
                                $("#productos").append("<tr><td>"+element.product.name+"</td><td>"+element.cantidad+"</td><td>"+element.size+"</td><td>$"+element.price+"</td><td>$"+element.final_price+".00</td></tr>");
                            });
                            console.log(response[0].sale.guiaRastreo );
                        if(response[0].sale.guiaRastreo !== null){
                            $('#mostrarGuia').html('Guía de rastreo: '+response[0].sale.guiaRastreo +' <br> '+ 'Paquetería: ' +response[0].sale.paqueteria);
                        }else{
                            $('#addRastreo').show();
                            $('#mostrarGuia').html('ENVÍO PENDIENTE');
                        
                        }
                            $('#pago').html('$'+response[0].sale.total+'.00');
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
@endpush


@endsection