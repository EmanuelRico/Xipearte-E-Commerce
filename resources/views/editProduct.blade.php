@extends('layouts.appAdmin')

@section('title', 'Xipearte')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message-type') }} alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <i class="glyphicon glyphicon-{{ Session::get('message-type') == 'success' ? 'ok' : 'remove'}}"></i> {{ Session::get('message') }}
    </div>
@endif


    <div class="container">
        <form action="/actualizarProducto" method="POST" enctype="multipart/form-data" id="updateProduct">
            @csrf
            <input type="hidden" name="id" value="{{ $p->id }}">
            <div class="row justify-content-md-center ">

                <div class="col col-lg-8">
                    <h2 class="fw-bold pt-4 pb-4">Editar producto</h2>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label font-weight-normal">Nombre del producto</label>
                        <input value="{{ $p->name }}" name="name" type="text" class="form-control border-dark border-2"
                            style="background-color: white" id="basic-url" aria-describedby="basic-addon3"
                            placeholder="Nombre..." aria-label="Nombre..." required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Descripción del producto</label>
                        <textarea name="description" class="form-control border-dark border-2" style="background-color: white"
                            id="exampleFormControlTextarea1" rows="6" required>{{ $p->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="basic-url" class="form-label">Precio</label>
                        <input value="{{ $p->price }}" name="price" type="number" step="0.01"
                            class="form-control border-dark border-2" style="background-color: white" id="basic-url"
                            aria-describedby="basic-addon3" placeholder="" required>
                    </div>
                    <div class="form-row mb-3">
                        <label for="basic-url" class="form-label">Stock disponible</label>
                        <div class="form-group">
                            <input value="{{ $p->stock }}" name="stock" type="number"
                                class="form-control border-dark border-2 " style="background-color: white" id="basic-url"
                                aria-describedby="basic-addon3" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <label for="basic-url" class="form-label">Escoga las categorias</label>
                        <div class="form-group">
                            @foreach ($categories as $c)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{$c->id}}" id="flexCheckDefault{{$c->id}}" name="categorie{{$c->id}}">
                                <label class="form-check-label" for="flexCheckDefault{{$c->id}}">
                                  {{$c->name}}
                                </label>
                              </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Seleccionar imágenes a mostrar</label>
                        <div class="input-group">
                            <input name="images[]" class="form-control" type="file" id="formFileMultiple" accept="image/*"
                                multiple hidden  />
                            <!-- our custom upload button -->
                            <label for="formFileMultiple" class="selectImage rounded-start col-4">Seleccionar imágenes
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-folder-plus" viewBox="0 0 16 16">
                                    <path
                                        d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z" />
                                    <path
                                        d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z" />
                                </svg>
                            </label>

                            <!-- name of file chosen -->
                            <span id="file-chosen" class="selectImage2 rounded-end col me-0">Imágenes no seleccionadas</span>
                        </div>
                    </div> --}}
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Lugar de origen</label>
                        <input name="origin" value="{{$p->origin}}" class="form-control border-dark border-2" id="exampleFormControlTextarea1" rows="6" style="background-color: white"
                            required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Acerca del lugar de origen</label>
                        <textarea name="aboutOrigin" class="form-control border-dark border-2" id="exampleFormControlTextarea1" rows="6" style="background-color: white"
                            required>{{$p->originDescription}}</textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Imagenes asignadas al producto</label>
                        <div class="row">
                            @foreach($p->imagenes as $foto)
                            <div class="col-md-4">
                                <button type="button" class="btn btn-danger btn btn-sm eliminaFoto" id="{{$foto->id}}" style="position:absolute"><i class="fa fa-remove"></i></button>
                                <img class="img-fluid" src="{{asset('assets/'.$foto->route)}}">
                            </div>
                            @endforeach
                        </div>
                        
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1">Agregar imagenes al producto</label>
                        <div class="dropzone" id="my-awesome-dropzone">
            
                        </div>
                    </div>

                    <button type="submit" class="btn btn-dark col-12 d-block py-3 rounded-3 mt-3 mb-3">
                        <h4 class="my-0 py-0">Editar producto</h4>
                    </button>
                </div>
            </div>
        </form>

    </div>

    <script src="{{ asset('js/addProduct.js') }}"></script>
@endsection
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.eliminaFoto').click(function() {
            var id = $(this).attr('id');
            $.ajax({
                url: '/eliminaFoto/'+id,
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                },
                type: 'DELETE',
                success: function(result) {
                    location.reload();
                }
            });
        })
    </script>
    <script>

        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone('.dropzone',{
            url:'/unaUrl',
            acceptedFiles: 'image/*',
            dictDefaultMessage:'Selecciona o arrastra las imagenes aquí',
            maxFiles: 5, 
            autoProcessQueue: false,
            uploadMultiple:true,
            parallelUploads: 10,
            headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}',
            },
        });

        $(function(){
            $("#updateProduct").on("submit",function(e){
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
                        myDropzone.options.url =  '/subirImagenes/'+response.id;
                        myDropzone.processQueue();
                        myDropzone.on("success", function(file, responseText) {
                            location.reload();
                            // location.href = "/editarProducto/"+response.id;
                            // console.log('hola');
                        });
                    },
                    error: function(response){

                    },
                })
            });
        });

        
    </script>

@endpush