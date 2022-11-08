@extends('layouts.appAdmin')

@section('title',"Xipearte")

@section('content')


<div class="container">

    <form action="/saveCategory" method="POST" id="addCategory">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col col-lg-8">
            <h2 class="fw-bold pt-4 pb-4">Añadir nueva categoría</h2>
                <div class="mb-3">
                    <label for="basic-url" class="form-label font-weight-normal">Nombre de la categoría</label>
                    <input id="categoryName" name="categoryName" required type="text" class="form-control border-dark border-2" id="basic-url" aria-describedby="basic-addon3" placeholder="Nombre..." aria-label="Nombre...">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Descripción de la categoría</label>
                    <textarea  id="categoryDescription"  required name="categoryDescription" class="form-control border-dark border-2" id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
                
                <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3" id="add_category_button"> 
                    Añadir categoría
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
    $("#addCategory").on("submit",function(e){
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
                location.href = "/editarCategoria/"+response.id;
            },
            error: function(response){

            },
        });
    $("#add_category_button").prop('disabled',true)
        return false;
    });
});

</script>
@endpush