@extends('layouts.appAdmin')

@section('title', 'Editar Categoría')

@section('content')
    @if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
    </div>
    @endif
    <div class="container">
        <form action="/actualizarCategoria" method="POST" id="updateCategory">
            @csrf
            <input type="hidden" name="id" value="{{ $c->id }}">
            <div class="row justify-content-md-center">
                <div class="col col-lg-8">
                    <h2 class="fw-bold pt-4 pb-4">Editar categoría</h2>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label font-weight-normal">Nombre de la categoría</label>
                        <input value="{{ $c->name }}" id="categoryName" name="name" required type="text"
                            class="form-control border-dark border-2" id="basic-url" aria-describedby="basic-addon3"
                            placeholder="Nombre..." aria-label="Nombre...">
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Descripción de la categoria</label>
                        <textarea id="categoryDescription" required name="description" class="form-control border-dark border-2"
                            id="exampleFormControlTextarea1" rows="6">{{ $c->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3" id="edit_category_button">
                        Editar categoría
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script>

$(function(){
    $("#updateCategory").on("submit",function(e){
        e.preventDefault();
        var action = $(this).attr("action");
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
                location.reload();
            },
            error: function(response){

            },
        });
    $("#edit_category_button").prop('disabled',true)
        return false;
    });
});

</script>
@endpush