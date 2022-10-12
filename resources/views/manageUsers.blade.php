@extends('layouts.appAdmin')

@section('css')
    <link rel="stylesheet" href="{{asset('DataTables/datatables.min.css')}}">
    <link rel="stylesheet" href="{{asset('DataTables/DataTables-1.12.1/css/dataTables.bootstrap5.min.css')}}">
@endsection

@section('title', 'Editar Usuarios')

@section('content')
    <div class="container d-flex justify-content-around flex-wrap">
        <div class="row w-100">
            <div class="col-md-8">
                <h2 class="fw-bold pt-4 pb-3 w-100">Usuarios</h2>
            </div>
            <div class="col-md-4 align-items-center d-flex " >
                <div class="  " hidden>
                    <form class="d-flex" action="----" method="GET">
                        @csrf
                        <input class="form-control me-2 " name="search" id="search" type="search" placeholder="Buscar"
                            aria-label="Buscar">
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
                <div class="table-responsive hscroll">
                    <table id="tablaUsuarios"  class="table table-condensed ">
                        <thead>
                            <tr>
                                <th style="width:45%">{{ 'Correo electrónico' }}</th>
                                <th style="width:45%">{{ 'Nombre' }}</th>
                                <th style="width:10%">{{ 'Administrador' }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $u)
                                <tr>
                                    <td data-th="Correo electrónico">{{ $u->email }}</td>
                                    <td data-th="Nombre">{{ $u->name }}</td>

                                    <td data-th="Administrador">
                                        <div class="form-check form-switch form-check-reverse" id="">
                                            <input class="form-check-input" type="checkbox" id='{{$u->id}}'
                                                @if ($u->type == 2) checked @endif
                                                onClick="changeUserType({{ $u->id }}, {{ $u->type }})">
                                        </div>
                                    </td>

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
    async function changeUserType(id, type) {
        if (type == 1) type = 2;
        else type = 1;
        var funtion = "changeUserType(" + id + ',' + type + ")";
        document.getElementById(id.toString()).setAttribute("onClick", funtion);
        console.log(id + " " + type);
        var actualRoute = document.URL;
        var url = actualRoute + '/' + String(id) + '/' + String(type);
        fetch(url)
            // Exito
            .then(response => response.json()) // convertir a json

            .then(json => console.log(json)) //imprimir los datos en la consola

            .catch(err => console.log('Solicitud fallida', err)); // Capturar errores

    }
</script>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="{{asset('dataTables/dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('#tablaUsuarios').DataTable( {
            ordering: true,
            language: {
            lengthMenu: 'Mostrando _MENU_ pedidos por página',
            zeroRecords: 'No se encontro ninguna coincidencia',
            info: 'Mostrando página _PAGE_ de _PAGES_',
            infoEmpty: 'No hay pedidos',
            infoFiltered: '(Filtrados de _MAX_ pedidos totales)',
            "search":         "Buscar:",
            "paginate": {
                "first":      "Primero",
                "last":       "Último",
                "next":       "Siguiente",
                "previous":   "Anterior"
            },
        },
            } );
        });
    </script>
@endpush