@extends('welcome')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario Administrador</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@section('content')

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
                            {{-- @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif --}}
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                </div>
                            @endif
                            <div class="row mb-3">
                                <label for="user-type" class="col-sm-4 col-form-label text-end">Tipo de usuario</label>
                                <div class="col-sm-8">
                                    <select class="form-select" id="user-type" name="user_type">
                                        <option value="Administrador" {{ (isset($usuario) && $usuario->rol == 'administrador') ? 'selected' : '' }}>Administrador</option>
                                        <option value="Secretaria" {{ (isset($usuario) && $usuario->rol == 'secretaria') ? 'selected' : '' }}>Secretaria</option>
                                        <option value="Guardia" {{ (isset($usuario) && $usuario->rol == 'guardia') ? 'selected' : '' }}>Guardia</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-sm-4 col-form-label text-end">Nombre</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}}"
                                    id="first_name" value="{{isset($usuario)? $usuario->nombre: old('nombre') }}">

                                    @error('nombre')
                                        <div class="invalid-feedback">
                                            <ul style="list-style: none; padding: 0;">
                                                <p>{{$message}}</p>
                                            </ul>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-4 col-form-label text-end">Apellido</label>
                                <div class="col-sm-8">
                                    <input type="text" name="apellido" class="form-control {{$errors->has('apellido')?'is-invalid':''}}"
                                    id="last_name" value="{{isset($usuario)? $usuario->apellido: old('apellido') }}">

                                    @error('apellido')
                                        <div class= "invalid-feedback">
                                            <ul style="list-style: none; padding: 0;">
                                                <p>{{$message}}</p>
                                            </ul>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-4 col-form-label text-end">Usuario</label>
                                <div class="col-sm-8">
                                    <input type="text" name="usuario" class="form-control {{$errors->has('usuario')?'is-invalid':''}}"
                                    id="username" value="{{isset($usuario)? $usuario->usuario: old('usuario') }}">

                                    @error('usuario')
                                        <div class= "invalid-feedback">
                                            <ul style="list-style: none; padding: 0;">
                                                <p>{{$message}}</p>
                                            </ul>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-sm-4 col-form-label text-end">Correo electrónico</label>
                                <div class="col-sm-8">
                                    <input type="email" name="correo" class="form-control {{$errors->has('correo')?'is-invalid':''}}"
                                    id="correo" value="{{isset($usuario)? $usuario->correo: old('correo') }}">

                                    @error('correo')
                                        <div  class= "invalid-feedback">
                                            <ul style="list-style: none; padding: 0;">
                                                <ul style="list-style: none; padding: 0;">
                                                    <p>{{$message}}</p>
                                                </ul>
                                            </ul>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-sm-4 col-form-label text-end">Teléfono</label>
                                <div class="col-sm-8">
                                    <input type="phone" name="telefono" class="form-control {{$errors->has('telefono')?'is-invalid':''}}"
                                    id="phone" value="{{isset($usuario)? $usuario->telefono: old('telefono') }}">

                                    @error('telefono')
                                        <div class= "invalid-feedback">
                                            <ul style="list-style: none; padding: 0;">
                                                <p>{{$message}}</p>
                                            </ul>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3 divPassword" {{ isset($usuario) ? 'style=display:none' : '' }}>
                                <label for="password" class="col-sm-4 col-form-label text-end">Contraseña</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                               id="password" value="{{isset($usuario)? $usuario->password: old('password') }}">
                                        <div class="input-group-text">
                                            <i class="fas fa-eye-slash" onclick="togglePasswordVisibility('password')"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                    <div class="" style="color: #d9534f; font-size: 12px">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 divPassword" {{ isset($usuario) ? 'style=display:none' : '' }}>
                                <label for="confirm-password" class="col-sm-4 col-form-label text-end">Confirmar contraseña</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" {{ isset($usuario) ? 'disabled' : '' }} >
                                        <div class="input-group-text">
                                            <i class="fas fa-eye-slash" onclick="togglePasswordVisibility('password_confirmation')"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{-- <div class="">
                                <div class="col-sm-8 d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-custom-width me-3">Guardar</button>
                                    <a href="{{ route('vistaRegister') }}" class="btn btn-secondary btn-md btn-custom-width" type="button">Cancelar</a>
                                </div>
                            </div> --}}

                            <div class="row row-gap-3 pt-4 ">
                                <div class="col-md-6">
                                    <button type="submit" href="" class="btn btn-primary-pk btn-block w-100"">Registrar</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('vistaRegister') }}" class="btn btn-danger-dg btn-block w-100">
                                        Cancelar
                                    </a>
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
@endsection
