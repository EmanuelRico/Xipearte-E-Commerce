@extends('layouts.app')
@section("title", "Error")
@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <p class="h1 text-center">Error<br>Categoría no encontrada</p>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-link" onclick="history.back()">Regresar</button>
        </div>
    </div>
@endsection