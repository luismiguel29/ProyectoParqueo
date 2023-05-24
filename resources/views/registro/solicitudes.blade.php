@extends('welcome')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <link href="{{ asset('css/stylesV.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Tarjeta pequeña</title>

</head>
@section('content')
<body>
    <style>
        .wordwrap {
           word-wrap: break-word;
           max-width: 400px; //ajusta este valor como necesites
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
            <h4 class="text mb-0"><i class="fas fa-file-alt pe-2"></i> Solicitudes</h4>

        </div>
        <div class="table-responsive" id="table-container">
            <div class="blue-line"></div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Sitio</th>
                        <th>Descripción</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->id }}</td>
                            <td>{{ $solicitud->usuario }}</td>
                            <td>{{ $solicitud->sitio }}</td>
                            <td class="wordwrap">
                                <!-- Versión corta de la descripción -->
                                <div id="short-description-{{ $solicitud->id }}">
                                    {{ \Illuminate\Support\Str::limit($solicitud->descripcion, 50, '...') }} <!-- Limita la descripción a 50 caracteres -->
                                    <button class="btn btn-link p-0 m-0 align-baseline" onclick="showFullDescription({{ $solicitud->id }})">ver más</button>
                                </div>

                                <!-- Versión completa de la descripción -->
                                <div id="full-description-{{ $solicitud->id }}" style="display: none;">
                                    {{ $solicitud->descripcion }}
                                    <button class="btn btn-link p-0 m-0 align-baseline" onclick="hideFullDescription({{ $solicitud->id }})">ver menos</button>
                                </div>
                            </td>
                            <td>{{ $solicitud->fecha }}</td>
                            <td>
                                <!-- Aquí irían los botones y modales -->
                                <!-- Botón eliminar que abre el modal -->
                                {{-- <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#reviewModal-{{ $solicitud->id }}">
                                    <i class="fas fa-check"></i>
                                </button> --}}

                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $solicitud->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>



                                <!-- Modal de confirmación de eliminación -->
                                <div class="modal fade" id="deleteModal-{{ $solicitud->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel">Confirmar eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estás seguro de que quieres eliminar la solicitud {{ $solicitud->id }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button"
                                                class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal de confirmación -->
                                {{-- <div class="modal fade" id="reviewModal-{{ $solicitud->id }}" tabindex="-1" aria-labelledby="reviewModalLabel{{ $solicitud->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="reviewModalLabel{{ $solicitud->id }}">Revisado</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                        </div>
                                        <div class="modal-body">
                                          Esta solicitud ha sido revisada.
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                      </div>
                                    </div>
                                </div> --}}

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function showFullDescription(id) {
            document.getElementById('short-description-' + id).style.display = 'none';
            document.getElementById('full-description-' + id).style.display = 'block';
        }

        function hideFullDescription(id) {
            document.getElementById('short-description-' + id).style.display = 'block';
            document.getElementById('full-description-' + id).style.display = 'none';
        }
    </script>
    <script>
        function openModal() {
            $('#myModal').modal('show');
        }
    </script>
</body>

</html>
@endsection
