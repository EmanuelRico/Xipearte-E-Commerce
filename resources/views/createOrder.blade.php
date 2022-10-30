@extends('layouts.app')

@section('title', 'Xipearte')

@section('content')

    <div class="container">

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <div class="row justify-content-md-center ">
            <div class="col col-lg-8">

                <div class="position-relative m-4">
                    <div class="progress" style="height: 1px;">
                      <div class="progress-bar" role="progressbar" aria-label="Progress" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <button type="button" class="position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                    <button type="button" class="position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                    <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">3</button>
                  </div>

                <h2 class="fw-bold pt-4 pb-4">Resumen del pedido</h2>
                <h3 class="fw-bold pt-4 pb-4">Dirección</h3>
                <div class="table-responsive hscroll">
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
                </div>
                <div class="table-responsive hscroll">
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
                </div>
                <input type="hidden" name="address" value="{{ json_encode($direccion, true) }}">
                <h3 class="fw-bold pt-4 pb-4">Productos</h3>
                <div id="productos-compra">
                    <div class="table-responsive hscroll">
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
                    </div>
                    <div class="row text-right" id="total">
                        <div class="col-8" id="total">
                            @php $total += 299; @endphp
                            <input type="hidden" id="totalEnvio" name="total" value="{{ $total }}">
                            <h5><strong id="total2" name="total " class="text-right">Total:
                                    ${{ $total }}</strong></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col col-lg-8">

                <form id="payment-form">
                    <div id="payment-element">
                        <!--Stripe.js injects the Payment Element-->
                      </div>
                      <button id="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3">
                        <div class="spinner hidden" id="spinner"></div>
                        <span id="button-text">Pagar ahora</span>
                      </button>
                      <div id="payment-message" class="hidden"></div>
                </form>

            </div>
            
        </div>
        
    </div>

@endsection

@push('scripts')

    <script src="https://js.stripe.com/v3/"></script> 
    <script>
        var stripekey = "{{ env('STRIPE_KEY') }}";
        var stripe = Stripe(stripekey);
        const items = { user_id: '{{ Auth::user()->id }}', direccion:'{!! json_encode($direccion) !!}', total: document.getElementById('totalEnvio').value };
        var id;
        initialize();
        document
            .querySelector("#payment-form")
            .addEventListener("submit", handleSubmit);
        async function initialize() {
            const { clientSecret, order_id } = await fetch("/crearOrden", {
                method: "POST",
                headers: { 
                "Content-Type": "application/json",
                'X-CSRF-TOKEN': '{{csrf_token()}}', },
                body: JSON.stringify(items),
            }).then((r) => r.json());

            id = order_id;
            const appearance = {
                theme: 'flat',
                variables: {
                    fontFamily: ' "Gill Sans", sans-serif',
                    fontLineHeight: '1.5',
                    borderRadius: '10px',
                    colorBackground: '#F6F8FA',
                    colorPrimaryText: '#262626'
                },
                rules: {
                    '.Block': {
                    backgroundColor: 'var(--colorBackground)',
                    boxShadow: 'none',
                    padding: '12px'
                    },
                    '.Input': {
                    padding: '12px'
                    },
                    '.Input:disabled, .Input--invalid:disabled': {
                    color: 'lightgray'
                    },
                    '.Tab': {
                    padding: '10px 12px 8px 12px',
                    border: 'none'
                    },
                    '.Tab:hover': {
                    border: 'none',
                    boxShadow: '0px 1px 1px rgba(0, 0, 0, 0.03), 0px 3px 7px rgba(18, 42, 66, 0.04)'
                    },
                    '.Tab--selected, .Tab--selected:focus, .Tab--selected:hover': {
                    border: 'none',
                    backgroundColor: '#fff',
                    boxShadow: '0 0 0 1.5px var(--colorPrimaryText), 0px 1px 1px rgba(0, 0, 0, 0.03), 0px 3px 7px rgba(18, 42, 66, 0.04)'
                    },
                    '.Label': {
                    fontWeight: '500'
                    }
                }
            };

            elements = stripe.elements({ clientSecret, appearance });
            const paymentElement = elements.create("payment");
            paymentElement.mount("#payment-element");
        }

        async function handleSubmit(e) {
            e.preventDefault();
            setLoading(true);

            await stripe.confirmPayment({
                elements,
                confirmParams: {
                    return_url: "{{ env('STRIPE_KEY') }}" + "/pagoExitoso/"+id,
                },
            });

            if (error.type === "card_error" || error.type === "validation_error") {
                showMessage(error.message);
            } else {
                showMessage("An unexpected error occurred.");
            }

            setLoading(false);
        }


        function showMessage(messageText) {
            const messageContainer = document.querySelector("#payment-message");

            messageContainer.classList.remove("hidden");
            messageContainer.textContent = messageText;

            setTimeout(function () {
                messageContainer.classList.add("hidden");
                messageText.textContent = "";
            }, 4000);
        }

        
        function setLoading(isLoading) {
            if (isLoading) {
                // Disable the button and show a spinner
                document.querySelector("#submit").disabled = true;
                document.querySelector("#spinner").classList.remove("hidden");
                document.querySelector("#button-text").classList.add("hidden");
            } else {
                document.querySelector("#submit").disabled = false;
                document.querySelector("#spinner").classList.add("hidden");
                document.querySelector("#button-text").classList.remove("hidden");
            }
        }

    </script>

@endpush
