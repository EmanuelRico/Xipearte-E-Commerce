@extends('layouts.appAdmin')

@section('title',"Pedidos")

@section('content')


<div class="mt-5">
    <div class="container" id="cuadro">
        <h2 class="fw-bold pt-4 pb-4">Pedidos</h2>
        <table id="tablaPedidos" class="table table-condensed">
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>ID Cliente</th>
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
                        <th scope="row">{{$order->id}}</th>
                        <th scope="row">{{$order->user_id}}</th>
                        <td class="">
                        @foreach (json_decode($order->direccion) as $key => $value)
                            @if($key == 'Codigo Postal')
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

    @if ($orders->isEmpty())

    @else

    <div class="modal fade" id="pedido-Modal" role="dialog" tabindex="-1" aria-labelledby="pedido-Modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title" style="font-size:22px" id="verPedidoLabel">Ver pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 for="" style="font-size:18px">ID de Pedido</h5>
                    <p id="IDOrder"></p>
                    <br>
                    <h5 for="" style="font-size:18px">Productos</h5>
                    <table class="m-auto">
                        <thead>
                            <tr>
                                <th style="width:45%">Nombre de Producto</th>
                                <th style="width:25%">Cantidad</th>
                                <th style="width:20%">Precio</th>
                            </tr>
                        </thead>
                        <tbody id="productos">
                        </tbody>
                    </table>
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
                    $('#IDOrder').html(response.sale_id);
                    const products = JSON.parse(response.products);
                    for (let x in products) {
                        $("#productos").append("<tr><td>"+products[x].name+"</td><td>"+ products[x].quantity+"</td><td>"+ products[x].price+"</td></tr>");
                    }
                    $('#pago').html('$'+response.final_price);
                    $('#pedido-Modal').modal('show');
                },
            })
        })

        $("#pedido-Modal").on("hidden.bs.modal", () => {
            $("#productos").html("")
        });
    });
</script>

@endsection