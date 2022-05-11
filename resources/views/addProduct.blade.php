@extends('layouts.appAdmin')

@section('title',"Xipearte")

@section('content')


<div class="container">
    <h2 class="fw-bold">Añadir nuevo producto</h2>
    <div class="row justify-content-md-center">
        <div class="col col-lg-8">
            <div class="mb-3">
                <label for="basic-url" class="form-label font-weight-normal">Nombre del producto</label>
                <input type="text" class="form-control border-dark border-2" style="background-color: white" id="basic-url" aria-describedby="basic-addon3" placeholder="Nombre..." aria-label="Nombre...">
            </div>
            <div class="form-group mb-3">
                <label for="exampleFormControlTextarea1">Descripción del producto</label>
                <textarea class="form-control border-dark border-2" style="background-color: white" id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
            <div class="mb-3">
                <label for="basic-url" class="form-label">Precio</label>
                <input type="text" class="form-control border-dark border-2" style="background-color: white" id="basic-url" aria-describedby="basic-addon3" placeholder="" aria-label="Nombre...">
            </div>
            <div class="form-row mb-3">
                <label for="basic-url" class="form-label">Stock disponible</label>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control border-dark border-2 " style="background-color: white" id="basic-url" aria-describedby="basic-addon3" placeholder="" aria-label="Nombre...">
                </div>
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label">Seleccionar imágenes a mostrar</label>
                <div class="input-group " > 
                    <input class="form-control" type="file" id="formFileMultiple" accept="image/*" multiple hidden/>
                    <!-- our custom upload button -->
                    <label for="formFileMultiple" class="selectImage rounded-start">Seleccionar imágenes
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                            <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                            <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                          </svg> 
                    </label>

                    <!-- name of file chosen -->
                    <span id="file-chosen" class="selectImage2 rounded rounded-end">Imágenes no seleccionadas</span>
                    <!--<input type="file" class="form-control border-dark border-2" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" placeholder="">
                    --> </div>
            </div>
            <div class="form-group mb-3" >
                <label for="exampleFormControlTextarea1">Acerca del lugar de origen</label>
                <textarea class="form-control border-dark border-2" id="exampleFormControlTextarea1" rows="6"></textarea>
            </div>
            <button type="button" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3"> <h4 class="my-0 py-0">Añadir producto
                   
            </h4></button>

        </div>
    </div>
</div>

<script src="{{asset('js/addProduct.js')}}"></script>
@endsection