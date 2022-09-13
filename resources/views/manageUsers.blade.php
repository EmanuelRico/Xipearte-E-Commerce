@extends('layouts.appAdmin')

@section('title', 'Editar Usuarios')

@section('content')
    <div class="container d-flex justify-content-around flex-wrap">
        <div class="row w-100">
            <div class="col-md-8">
                <h2 class="fw-bold pt-4 pb-3 w-100">Usuarios</h2>
            </div>
            <div class="col-md-4 align-items-center d-flex">
                <div class="  ">
                    <form class="d-flex" action="----" method="GET">
                        @csrf
                        <input class="form-control me-2 " name="search" id="search" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn " type="submit"><i
                                class="title-hover fa-solid fa-lg fa-magnifying-glass text-black me-1"></i></button>
                    </form>
                </div>
            </div>
           
           
        </div>
        
    
        
    </div>
    <div class="container">
        <div class="row justify-content-md-center ">
            <div class="col col-lg-8">
                <div class="table-responsive">
                    <table class="table table-condensed ">
                        <thead>
                            <tr>
                                <th style="width:45%">{{ "Correo electrónico" }}</th>
                                <th style="width:45%">{{ "Nombre" }}</th>
                                <th style="width:10%">{{ "Administrador" }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                            <tr>
                                
                                    <td data-th="Correo electrónico">{{ $u->email}}</td>
                                    <td data-th="Nombre">{{ $u->name }}</td>
                   
                                    @if ($u->type == 1)
                                        <td data-th="Administrador"> <div class="form-check form-switch form-check-reverse">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse" onclick="changeToAdmin({{ $u->id }})">
                                        </div> 
                                        </td> 
                                    @endif
                                    @if ($u->type == 2)
                                        <td data-th="Administrador"> <div class="form-check form-switch form-check-reverse">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckReverse" checked onclick="changeToNormal({{ $u->id }})">
                                        </div> 
                                        </td> 
                                    @endif
                                
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    async function changeToAdmin(id) {
        var actualRoute = document.URL;
        fetch(actualRoute  + '/Admin/' + String(id))
            // Exito
            .then(response => response.json()) // convertir a json
            
            .then(json => console.log(json)) //imprimir los datos en la consola

            .catch(err => console.log('Solicitud fallida', err)); // Capturar errores
    }

    async function changeToNormal(id) {
        var actualRoute = document.URL;
        fetch(actualRoute  + '/Normal/' + String(id))
            // Exito
            .then(response => response.json()) // convertir a json
            
            .then(json => console.log(json)) //imprimir los datos en la consola

            .catch(err => console.log('Solicitud fallida', err)); // Capturar errores

    }
</script>