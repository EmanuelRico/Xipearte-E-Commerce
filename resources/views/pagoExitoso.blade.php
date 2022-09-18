@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')

    <div class="container">
        Pago exitoso!!!
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="row justify-content-md-center ">
            <div class="col col-lg-8">
                <h2 class="fw-bold pt-4 pb-4">Resumen del pedido</h2>
                <h3 class="fw-bold pt-4 pb-4">Dirección</h3>

                <h3 class="fw-bold pt-4 pb-4">Productos</h3>
                <div id="productos-compra">
                    <table id="cart" class="table table-condensed">
                        <thead>
                            <tr>
                                <th style="width:35%">Producto</th>
                                <th style="width:15%">Precio</th>
                                <th style="width:13%">Cantidad</th>
                                <th style="width:27%" class="text-center">Subtotal</th>
                                <th style="width:10%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                    <tr data-id="{{ $id }}">
                                        <input type="hidden" name="cantidad" value="{{ $details['quantity'] }}">
                                        <input type="hidden" name="precio"
                                            value="{{ $details['price'] * $details['quantity'] }}">
                                        <td data-th="Producto">{{ $details['name'] }}</td>
                                        <td data-th="Precio">${{ $details['price'] }}</td>
                                        <td data-th="Cantidad">{{ $details['quantity'] }}</td>
                                        <td data-th="Subtotal" class="text-center">
                                            ${{ $details['price'] * $details['quantity'] }}</td>
                                        <td class="actions" data-th="">
                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                    <td>Envio</td>
                                    <td>$299</td>
                                    <td></td>
                                    <td class="text-center">$299</td>
                                </tfoot>
                            @endif
                        </tbody>
                    </table>
                    <div class="row text-right" id="total">
                        <div class="col-8" id="total">
                            <input type="hidden" name="total" value="{{ $total }}">
                            @php $total += 299; @endphp
                            <h5><strong id="total2" name="total " class="text-right">Total:
                                    ${{ $total }}</strong></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


