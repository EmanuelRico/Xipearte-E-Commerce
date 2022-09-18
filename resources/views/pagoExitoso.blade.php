@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')

    <div class="container">
        <div class="row justify-content-md-center ">
            <div class="col col-lg-8">
                <h2 class="fw-bold pt-4 pb-4">Pago realizado correctamente</h2>
                <p>
                    Empezaremos a preparar el pedido para enviarlo y te haremos llegar tu guía de rastreo
                </p>
                {{$order->user->name}} <br>
                {{$order->user->email}} <br>

                Total de la orden: ${{number_format($order->total,2)}} (Con envío)
                
                <h2 class="fw-bold pt-4 pb-4">Dirección</h2>
                @foreach ($direccion as $d)
                    {{$d}}
                @endforeach
                <h2 class="fw-bold pt-4 pb-4">Productos</h2>
                <table id="cart" class="table table-condensed">
                    <thead>
                        <tr>
                            <th style="width:35%">Producto</th>
                            <th style="width:15%">Precio</th>
                            <th style="width:6%">Cantidad</th>
                            <th style="width:7%">Talla</th>
                            <th style="width:27%" class="text-center">Subtotal</th>
                            <th style="width:10%"></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($order->sold_product as $sp)
                                <tr>
                                    <td data-th="Producto">{{ $sp->product_id }}</td>
                                    <td data-th="Precio">${{ $sp->price}}</td>
                                    <td data-th="Cantidad">{{$sp->cantidad}}</td>
                                    <td data-th="Talla">{{$sp->size}}</td>
                                    <td data-th="Subtotal" class="text-center">
                                        ${{ $sp->price * $sp->cantidad }}</td>
                                    <td class="actions" data-th="">
                                    </td>
                                </tr>
                            @endforeach
                            <tfoot>
                                <td>Envio</td>
                                <td>$299</td>
                                <td></td>
                                <td></td>
                                <td class="text-center">$299</td>
                            </tfoot>
                    </tbody>
                </table>

                <form action="/">
                    <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3">
                        <h4 class="my-0 py-0">Seguir comprando</h4>
                    </button>
                </form>
                
                
            </div>
        </div>
    </div>

@endsection


