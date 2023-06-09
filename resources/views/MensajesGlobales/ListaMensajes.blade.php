@extends('welcome')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/Cliente/listacliente.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Cliente/modalbotones.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @livewireStyles
@endsection
@section('content')

    <div class="container-fluid mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text mb-0"><i class="fa-solid fa-envelope"></i>Mensajes</h4>
            @if (session()->get('sesion')->rol == 'secretaria' || session()-> get('sesion')-> rol =='administrador')
                <a href="{{ route('Mensaje.formulario') }}" class="btn btn-primary btn-md" type="button"><i
                        class="fas fa-plus"></i> Agregar</a>
            @endif
        </div>
        <div class="table-responsive" id="table-container">
            @if ($mensajes->isNotEmpty())
                <div class="blue-line"></div>
                <table class="table">

                    <thead>
                        <tr>
                            <th>Asunto</th>
                            <th>Descripcion</th>
                            @if (session()->get('sesion')->rol == 'secretaria' || session()-> get('sesion')-> rol =='administrador')
                                <th>Enviar</th>
                                <th>Acciones</th>
                            @endif
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mensajes as $mensaje)
                            <tr>
                                <td>{{ $mensaje->asunto }}</td>
                                <td> {{ $mensaje->descripcion }}</td>
                                @if (session()->get('sesion')->rol == 'secretaria' || session()-> get('sesion')-> rol =='administrador')
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <button class="btn btn-primary btn-sm-individual" style="margin-right: 15px"
                                                data-bs-toggle="modal" data-id="{{ $mensaje->id }}"
                                                data-bs-target="#mensaje">Individual</button>
                                            <button
                                                class="btn btn-primary btn-global" data-bs-toggle="modal"
                                                data-id="{{ $mensaje->id }}" data-bs-target="#global">Global</button>


                                        </div>

                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('Mensaje.editarmensaje', ['id' => $mensaje->id]) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                            <button class="btn delete-btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-id="{{ $mensaje->id }}" data-bs-target="#deleteModal"><i
                                                    class="fas fa-trash-alt"></i></button>

                                        </div>
                                    </td>
                                @endif
                            </tr>
                        @endforeach

                    </tbody>

                </table>
                <!-- Modal para mensaje individual-->
                <div class="modal fade" id="mensaje" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Mensaje individual a Cliente</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>

                            </div>

                            @livewire('buscar-correo')
                        </div>
                    </div>
                </div>
                <!-- Modal para mensaje global-->
                <div class="modal fade" id="global" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Enviar Mensaje</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('Mensaje.mensajeglobal') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    <input id="mensajeGlobal" name="id" hidden>
                                    ¿Esta seguro de enviar este mensaje a todo los clientes titulares del sistema?
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary-pk">Enviar</button>
                                    <button type="button" class="btn btn-danger-dg " data-bs-dismiss="modal">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Eliminar-->
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Mensaje</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="{{ route('Mensaje.eliminar') }}" method="post">
                                <div class="modal-body">
                                    @csrf
                                    @method('delete')
                                    <input id="id" name="id" hidden>
                                    ¿Esta seguro de eliminar este mensaje?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary-pk"
                                        data-bs-dismiss="modal">Cancelar</button>
                                    <button class="btn btn-danger-dg">Eliminar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-dark" role="alert">
                    No existen mensajes registrados!
                </div>
            @endif
            <div>

            </div>

        </div>
    @section('scripts')
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {

                $('.delete-btn').on('click', function() {

                    let id = $(this).attr('data-id');
                    $('#id').val(id);

                });

                $('.btn-sm-individual').on('click', function() {

                    let id = $(this).attr('data-id');
                    $('#mensajeCorreo').val(id);

                });
                $('.btn-global').on('click', function() {

                let id = $(this).attr('data-id');
                $('#mensajeGlobal').val(id);

                });
                $('.js-example-basic-single').select2({
                    dropdownParent: $('#mensaje')
                });
            });
        </script>
        @livewireScripts
    @endsection




@endsection
