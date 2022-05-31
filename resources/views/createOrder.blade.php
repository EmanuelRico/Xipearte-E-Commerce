@extends('layouts.appAdmin')

@section('title', 'Xipearte')

@section('content')

    <div class="container">
        <form action="/crearOrden" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <div class="row justify-content-md-center ">
                <div class="col col-lg-8">
                    <h2 class="fw-bold pt-4 pb-4">Resumen del pedido</h2>
                    <h3 class="fw-bold pt-4 pb-4">Dirección</h3>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                @foreach ($direccion as $key => $value)
                                    <!--<p>{{ $key }}: {{ $value }}</p>-->
                                    @switch($key)
                                        @case('Calle')
                                            <th style="width:35%">{{ $key }}</th>
                                        @break

                                        @case('Numero Exterior')
                                            <th style="width:15%">Número exterior</th>
                                        @break

                                        @case('Numero Interior')
                                            <th style="width:15%">Número interior</th>
                                        @break

                                        @case('Colonia')
                                            <th style="width:35%">{{ $key }}</th>
                                        @break

                                        @default
                                    @endswitch
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($direccion as $key => $value)
                                    @switch($key)
                                        @case('Calle')
                                            <td data-th="Calle">{{ $value }}</td>
                                        @break

                                        @case('Numero Exterior')
                                            <td data-th="Número exterior">{{ $value }}</td>
                                        @break

                                        @case('Numero Interior')
                                            <td data-th="Número interior">{{ $value }}</td>
                                        @break

                                        @case('Colonia')
                                            <td data-th="Colonia">{{ $value }}</td>
                                        @break

                                        @default
                                    @endswitch
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                @foreach ($direccion as $key => $value)
                                    @switch($key)
                                        @case('Codigo Postal')
                                            <th style="width:15%">Código postal</th>
                                        @break

                                        @case('Referencias')
                                            <th style="width:35%">{{ $key }}</th>
                                        @break

                                        @case('Municipio')
                                            <th style="width:25%">{{ $key }}</th>
                                        @break

                                        @case('Estado')
                                            <th style="width:25%">{{ $key }}</th>
                                        @break

                                        @default
                                    @endswitch
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($direccion as $key => $value)
                                    @switch($key)
                                        @case('Codigo Postal')
                                            <td data-th="Código postal">{{ $value }}</td>
                                        @break

                                        @case('Referencias')
                                            <td data-th="Referencias">{{ $value }}</td>
                                        @break

                                        @case('Municipio')
                                            <td data-th="Municipio">{{ $value }}</td>
                                        @break

                                        @case('Estado')
                                            <td data-th="Estado">{{ $value }}</td>
                                        @break

                                        @default
                                    @endswitch
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="address" value="{{ json_encode($direccion, true) }}">
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
                                @endif
                            </tbody>
                        </table>
                        <div class="row text-right" id="total">
                            <div class="col-8" id="total">
                                <input type="hidden" name="total" value="{{ $total }}">
                                <h5><strong id="total2" name="total " class="text-right">Total:
                                        ${{ $total }}</strong></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div id="botones2" class="col position-relative mb-5">
                            @if (empty(Session::get('cart')))
                                <button type="submit" id="boton" class="btn btn-primary  position-absolute top-0 end-0 me-3"
                                    disabled>Continuar</button>
                            @else
                                <button type="submit" id="boton"
                                    class="btn btn-primary  position-absolute top-0 end-0 me-3 ">Continuar</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
