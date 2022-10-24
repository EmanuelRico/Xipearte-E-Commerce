@component('mail::message')
# Orden confirmada

# ¡Gracias por tu compra!
 
Hola, {{$data['user']['name']}} tu pago ha sido exitoso y ya estamos preparando tu pedido para enviarlo a tu domicilio.
En cuanto lo envimos, recibiras un nuevo correo con la información del envio.


@component('mail::panel')
Dirección de envio:
Calle {{json_decode($data['direccion'],true)['Calle']}}, 
#{{json_decode($data['direccion'],true)['Numero Exterior']}},
@if (json_decode($data['direccion'],true)['Numero Interior'] !== null)
   Interior {{json_decode($data['direccion'],true)['Numero Interior']}},
@endif
Col.{{json_decode($data['direccion'],true)['Colonia']}},
C.P. {{json_decode($data['direccion'],true)['Codigo Postal']}},
{{json_decode($data['direccion'],true)['Municipio']}}, {{json_decode($data['direccion'],true)['Estado']}}
Referencias: {{json_decode($data['direccion'],true)['Referencias']}}

@endcomponent


# Resumen del pedido
@component('mail::table')
| Producto      |  Talla        | Cantidad  |  Precio   |
| ------------- |:-------------:| ---------:| ---------:|
@foreach($data['sold_product'] as $product)
| {{$product['product']['name']}} | {{$product['size']}} | {{$product['cantidad']}} | ${{$product['product']['price']}}.00 | 
@endforeach
| Envio |  |  | $299.00 |
| Total |  |  | ${{$data['total']}}.00 |
@endcomponent

@component('mail::button', ['url' => env('APP_URL').'/pedidos'])
Ver orden
@endcomponent

Saludos,<br>
{{ config('app.name') }}
@endcomponent