
@extends('welcome')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Usuarios</title>
    <link href="{{ asset('css/stylesV.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
@section('content')
<body>
    <div class="container mt-5">
        @csrf
        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="text mb-0"><i class="fas fa-user"></i> Gestión de Usuario Administrador</h4>
            <a href="{{ route('crearUser') }}" class="btn btn-primary btn-md" type="button"><i class="fas fa-plus"></i> Agregar</a>

        </div>
        <div class="table-responsive" id="table-container">
            <div class="blue-line"></div>
            <table class="table">
                <thead>
                    <tr>
                        {{-- <th>ID</th> --}}
                        <th>Tipo de Usuario</th>
                        <th>Nombre</th>
                        <th>Usuario</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Correo</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            {{-- <td>{{ $usuario->id }}</td> --}}
                            <td>{{ $usuario->rol }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->usuario }}</td>
                            <td>{{ $usuario->apellido }}</td>
                            <td>{{ $usuario->telefono }}</td>
                            <td>{{ $usuario->correo }}</td>
                            <td>
                                <!-- Botón editar -->
                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <!-- Botón eliminar que abre el modal -->
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $usuario->id }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                                <!-- Modal de confirmación -->
                                <div class="modal fade" id="deleteModal-{{ $usuario->id }}" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $usuario->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title fs-5" id="deleteModalLabel-{{ $usuario->id }}">Confirmar eliminación</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro de que deseas eliminar este usuario?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>


                            </td>
                        </tr>
                    @endforeach
                    <!-- Añadir más filas -->
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        function adjustBlueLine() {
          const tableContainer = document.getElementById("table-container");
          const table = tableContainer.querySelector("table");
          const blueLine = tableContainer.querySelector(".blue-line");
          if (blueLine) {
            blueLine.style.width = `${table.clientWidth}px`;
          }
        }
        window.addEventListener("load", adjustBlueLine);
        window.addEventListener("resize", adjustBlueLine);
    </script>

</body>
</html>
@endsection
