@extends('welcome')
@section('content')
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/listahorario.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/boton.css') }}">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    </head>

    <body>
        <h1>{{ $parqueo->id }}</h1>
        <div class="container-fluid py-3">
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="row">
                    <div class="col">
                        <i class="fa-solid fa-handshake fa-2x pe-1"></i>
                        <span class="h3 ">Gestión compartir sitio</span>
                    </div>
                    <form action="{{ route('agregarusuario', $parqueo->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mt-2 p-2" style="">
                            <div class="col col-sm-3 p-2">
                                <select class="livesearch form-control {{ $errors->has('livesearch') ? 'is-invalid' : '' }}"
                                    name="livesearch" ></select>
                                @error('livesearch')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm p-2 text-end">
                                <button type="submit" class="btn btn-primary-pk" href="" @if ($parqueo->invitado > 0) disabled @endif><i class="fa-solid fa-plus"
                                        style="color: #ffffff;" ></i>
                                    Compartir</button>
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive card card-outline  border-top-pk   shadow">
                        @if ($parqueo->invitado > 0)
                            <table class="table table-striped mt-3 ">
                                <thead class="p-3">
                                    <tr>
                                        <th>Sitio</th>
                                        <th>Zona</th>
                                        <th>Invitado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $parqueo->sitio }}</td>
                                        <td>{{ $parqueo->zona }}</td>
                                        <td>{{ $parqueo->invitados->nombre }} {{ $parqueo->invitados->apellido }}</td>
                                        <td>
                                            <div class="d-inline-block">
                                                <button type="button" class="bicon icon--red" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">
                                                    <i class="fa-solid fa-trash-can icon--white"></i>
                                                </button>
                                            </div>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                ¡Atención!
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Esta seguro de eliminar el usuario con el que comparte el sitio?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary-pk"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                            

                                                            <form action="{{ route('eliminarusuario', $parqueo->id) }}" method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-danger-dg"
                                                                style="">Eliminar</button>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-dark">Actualmente no comparte sitio con ningun usuario</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            $('.livesearch').select2({
                placeholder: 'Buscar usuario',
                ajax: {
                    url: '/buscarusuario',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.nombre+" "+item.apellido,
                                    id: item.id,
                                }

                            })
                        };
                    },
                    cache: true
                }
            });
        </script>
    </body>


    </html>
@endsection
