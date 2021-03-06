@extends('layouts.app')

@section('title',"Xipearte")

@section('content')
<div class="container">
    <div id="botones1" class="col mt-3">
        <a href="{{ url('/') }}">< Volver a Catálogo</a>
    </div>
    <table id="cart" class="table table-condensed">
        <thead>
            <tr>
                <th style="width:45%">Producto</th>
                <th style="width:10%">Precio</th>
                <th style="width:8%">Cantidad</th>
                <th style="width:27%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0 @endphp
            @if(session('cart'))
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr data-id="{{ $id }}">
                        <td data-th="Producto">
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-4 hidden-xs">
                                            <img src="{{ asset('assets/'.$details['rImage'])}}" alt="" width="120" height="120">
                                        </div>
                                        <div class="col-sm-8">
                                            <h4 id="producto">{{ $details['name'] }}</h4>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </td>
                        <td data-th="Precio">${{ $details['price'] }}</td>
                        <td data-th="Cantidad">
                            <input type="number" min="0" oninput="validity.valid||(value='')" value="{{ $details['quantity'] }}" class="form-control quantity update-cart"/>
                        </td>
                        <td data-th="Subtotal" class="text-center">${{ $details['price'] * $details['quantity'] }}</td>
                        <td data-th="">
                            <button class="btn btn-danger btn-sm remove-from-cart"><i class="fa-solid fa-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table> 
    <div class="row text-right" id="total">
        <div class="col-8" id="total">
            <h5 ><strong class="text-right">Total ${{ $total }}</strong></h5>
        </div>
        <div class="col" id="compra">
            
        </div>
    </div>
    <hr class="solid" id="dividir">
    <div class="row"id="botones2 mb-5">
        <div class="col position-relative mb-5"  >
            <button class="btn btn-primary position-absolute top-0 end-0 me-3" onclick="location.href='/address'">Realizar Compra</button>
        </div>
    </div>       
</div>


<script type="text/javascript">
  
    $(".update-cart").change(function (e) {
        e.preventDefault();
        var ele = $(this);
        if($(this).val() == 0) {
            $.ajax({
                url: '{{ route('remove.from.cart') }}',
                method: "DELETE",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id")
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        } else {
            $.ajax({
                url: '{{ route('update.cart') }}',
                method: "PATCH",
                data: {
                    _token: '{{ csrf_token() }}', 
                    id: ele.parents("tr").attr("data-id"), 
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                window.location.reload();
                }
            });
        }
        
    });
  
    $(".remove-from-cart").click(function (e) {
        e.preventDefault();
  
        var ele = $(this);
  
        $.ajax({
            url: '{{ route('remove.from.cart') }}',
            method: "DELETE",
            data: {
                _token: '{{ csrf_token() }}', 
                id: ele.parents("tr").attr("data-id")
            },
            success: function (response) {
                window.location.reload();
            }
        });
    });
  
</script>
@endsection