@extends('welcome')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <link href="{{ asset('css/stylesV.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS de Bootstrap -->


    <!-- JS de Bootstrap, jQuery y Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">


</head>
@section('content')

<body>
    <style>
        .wordwrap {
            word-wrap: break-word;
            max-width: 400px; // ajusta este valor como necesites
        }
    </style>
    <style>
        .table {
            border-collapse: collapse;
        }

        .table th, .table td {
            border: none;
        }
    </style>



    <div class="container mt-5">
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text mb-0"><i class="fas fa-file-alt pe-2"></i> Asignar</h4>
        </div>
        <!-- Formulario de búsqueda -->
        {{-- <form method="GET" action="{{ route('asignar') }}">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Buscar por CI">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                </div>
            </div>
        </form> --}}

        <div class="table-responsive-fluid" id="table-container">
            <div class="blue-line"></div>
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Teléfono</th>
                        <th>Sitio</th>
                        <th>Zona</th>
                        <th>Estado</th>
                        <th>Invitado</th>
                        <th>Fecha de Asignación</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asignaciones as $asignacion)
                        <tr>
                            <td>{{ $asignacion->id }}</td>
                            <td>{{ $asignacion->nombre }}</td>
                            <td>{{ $asignacion->telefono }}</td>
                            <td>{{ $asignacion->sitio }}</td>
                            <td>{{ $asignacion->zona }}</td>
                            <td>{{ $asignacion->estado ? 'Activo' : 'Inactivo' }}</td>
                            <td>
                            @if($asignacion->nombre_invitado)
                                {{ $asignacion->nombre_invitado . ' ' . $asignacion->apellido_invitado }}
                            @else
                                No hay invitado
                            @endif
                            </td>
                            <td>{{ $asignacion->fechaasig }}</td>
                            <td>
                                <!-- Botón Asignar -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#asignarModal{{ $asignacion->id }}">Asignar</button>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmModal{{ $asignacion->id }}">Quitar invitado</button>

                                <!-- Modal de asignar -->
                                <div class="modal fade" id="asignarModal{{ $asignacion->id }}" tabindex="-1" aria-labelledby="asignarModalLabel{{ $asignacion->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="asignarModalLabel{{ $asignacion->id }}">Asignar Parqueo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nombreBuscador{{ $asignacion->id }}">Nombre de Usuario</label>
                                                    <input type="text" class="form-control" id="nombreBuscador{{ $asignacion->id }}" placeholder="Ingresar nombre">
                                                </div>
                                                <select id="resultados{{ $asignacion->id }}" class="form-control">
                                                </select>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="button" class="btn btn-primary" id="confirmarAsignacion{{ $asignacion->id }}" disabled>Confirmar Asignación</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal de quitarInvi -->
                                <div class="modal fade" id="confirmModal{{ $asignacion->id }}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmModalLabel">Confirmación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que deseas quitar al invitado?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('removeInvitado', $asignacion->id) }}" method="GET">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Sí, quitar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json"></script>


    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
                }
            });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

    </script>

    <script>
        @foreach($asignaciones as $asignacion)
            $(document).ready(function() {
                $("#nombreBuscador{{ $asignacion->id }}").on('input', function() {
                    var nombre = $(this).val();
                    $.get('{{ route('buscarPorNombre') }}', {nombre: nombre}, function(data) {
                        var select = $("#resultados{{ $asignacion->id }}");
                        select.empty();
                        data.forEach(function(user) {
                            select.append('<option value="'+ user.id +'">' + user.nombre + ' ' + user.apellido +' ' + user.ci + '</option>');
                        });
                        // Habilitar el botón de confirmación solo si hay resultados
                        $("#confirmarAsignacion{{ $asignacion->id }}").prop('disabled', !data.length);
                    });
                });

                $("#confirmarAsignacion{{ $asignacion->id }}").click(function() {
                    var idUsuario = $("#resultados{{ $asignacion->id }}").val();
                    // Aquí envías una solicitud a tu servidor para asignar el usuario con este ID a la tabla parqueo
                    $.post('/asignarUsuario', {idParqueo: {{ $asignacion->id }}, idUsuario: idUsuario}, function(data) {
                        if (data.message === 'Asignación realizada con éxito.') {
                            // Cerrar el modal y actualizar la página (o una parte de ella) aquí
                            $('#asignarModal{{ $asignacion->id }}').modal('hide');
                            location.reload();  // O actualiza solo una parte de la página
                        } else {
                            alert(data.message);  // O muestra el error de una forma más amigable
                        }
                    });
                });
            });
        @endforeach


    </script>



</body>


</html>
@endsection
