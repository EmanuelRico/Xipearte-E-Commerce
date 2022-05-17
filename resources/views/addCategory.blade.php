@extends('layouts.appAdmin')

@section('title',"Xipearte")

@section('content')


<div class="container">
    <h2 class="fw-bold">Añadir nueva categoria</h2>
    <form action="/saveCategory" method="POST">
        @csrf
        <div class="row justify-content-md-center">
            <div class="col col-lg-8">
                <div class="mb-3">
                    <label for="basic-url" class="form-label font-weight-normal">Nombre de la categoría</label>
                    <input id="categoryName" name="categoryName" required type="text" class="form-control border border-dark border-2" id="basic-url" aria-describedby="basic-addon3" placeholder="Nombre..." aria-label="Nombre...">
                </div>
                <div class="form-group mb-3">
                    <label for="exampleFormControlTextarea1">Descripción de la categoria</label>
                    <textarea  id="categoryDescription"  required name="categoryDescription" class="form-control border border-dark border-2" id="exampleFormControlTextarea1" rows="6"></textarea>
                </div>
                
                <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3"> 
                    Añadir categoría
                </button>
            </div>
        </div>
    </form>
</div>
@endsection