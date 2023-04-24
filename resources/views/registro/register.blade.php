<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 class="text mb-4"><i class="fas fa-user"></i> Registro de Usuario Administrador</h4>
                <div class="form-container">

                    <form action="{{ isset($usuario) ? route('usuarios.update', $usuario->id) : route('crearUser') }}" method="POST" novalidate>
                        {{-- quitarComentariosHtml --}}
                        @csrf
                        @if (isset($usuario))
                            @method('PUT')
                        @endif
                        <!-- Muestra el mensaje de éxito si está presente en la sesión -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                         @endif
                        <div class="row mb-3">
                            <label for="user-type" class="col-sm-4 col-form-label">Tipo de usuario</label>
                            <div class="col-sm-8">
                                <select class="form-select" id="user-type" name="user_type">
                                    <option value="administrador">Administrador</option>
                                    <option value="secretaria">Secretaria</option>
                                    <option value="guardia">Guardia</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="col-sm-4 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="nombre" placeholder="Ingrese su nombre"
                                value="{{ isset($usuario) ? $usuario->nombre : old('nombre') }}"">

                                @error('nombre')
                                    <div class="alert alert-danger mt-2 thin-border small-alert" role="alert">
                                        <p>{{$message}}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="col-sm-4 col-form-label">Apellido</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="apellido" placeholder="Ingrese su apellido"
                                value="{{ isset($usuario) ? $usuario->apellido : old('apellido') }}"">
                                @error('apellido')
                                    <div class="alert alert-danger mt-2 thin-border small-alert" role="alert">
                                        <p>{{$message}}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="username" class="col-sm-4 col-form-label">Usuario</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="username" name="usuario" placeholder="Ingrese su nombre de usuario"
                                value="{{ isset($usuario) ? $usuario->usuario : old('usuario') }}"">
                                @error('usuario')
                                    <div class="alert alert-danger mt-2 thin-border small-alert" role="alert">
                                        <p>{{$message}}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="email" class="col-sm-4 col-form-label">Correo electrónico</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingrese su correo electrónico"
                                value="{{ isset($usuario) ? $usuario->correo : old('correo') }}"">
                                @error('correo')
                                    <div class="alert alert-danger mt-2 thin-border small-alert" role="alert">
                                        <p>{{$message}}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="phone" class="col-sm-4 col-form-label">Teléfono</label>
                            <div class="col-sm-8">
                                <input type="tel" class="form-control" id="phone" name="telefono" placeholder="Ingrese su número de teléfono"
                                value="{{ isset($usuario) ? $usuario->telefono : old('telefono') }}"">
                                @error('telefono')
                                    <div class="alert alert-danger mt-2 thin-border small-alert" role="alert">
                                        <p>{{$message}}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-sm-4 col-form-label">Contraseña</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Ingrese su contraseña" {{ isset($usuario) ? 'disabled' : '' }}>
                                    <div class="input-group-text">
                                        <i class="fas fa-eye" onclick="togglePasswordVisibility('password')"></i>
                                    </div>
                                </div>
                                @error('password')
                                    <div class="alert alert-danger mt-2 thin-border small-alert" role="alert">
                                        <p>{{$message}}</p>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="confirm-password" class="col-sm-4 col-form-label">Confirmar contraseña</label>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirme su contraseña" {{ isset($usuario) ? 'disabled' : '' }}>
                                    <div class="input-group-text">
                                        <i class="fas fa-eye" onclick="togglePasswordVisibility('password_confirmation')"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8 d-flex">
                                <button type="submit" class="btn btn-primary me-2">Guardar</button>
                                <a href="{{ route('vistaRegister') }}" class="btn btn-secondary btn-md" type="button">Cancelar</a>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        function togglePasswordVisibility(id) {
        const input = document.getElementById(id);
        const icon = event.target;
        if (input.type === "password") {
        input.type = "text";
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
        } else {
        input.type = "password";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
        }
    }

    </script>
</body>
</html>
