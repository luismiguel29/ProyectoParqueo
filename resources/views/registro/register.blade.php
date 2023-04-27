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
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="row mb-3">
                                <label for="user-type" class="col-sm-4 col-form-label text-end">Tipo de usuario</label>

                                <div class="col-sm-8">
                                    <select class="form-select" id="user-type" name="user_type">
                                        <option value="administrador">Administrador</option>
                                        <option value="secretaria">Secretaria</option>
                                        <option value="guardia">Guardia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" class="col-sm-4 col-form-label text-end">Nombre</label>
                                <div class="col-sm-8">
                                    <input type="text" name="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}}"
                                    id="first_name" value="{{isset($user)? $user->nombre: old('nombre') }}">

                                    @error('nombre')
                                        <div class= class="invalid-feedback">
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
                                    id="last_name" value="{{isset($user)? $user->apellido: old('apellido') }}">

                                    @error('apellido')
                                        <div class= class="invalid-feedback">
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
                                    id="username" value="{{isset($user)? $user->usuario: old('usuario') }}">

                                    @error('usuario')
                                        <div class= class="invalid-feedback">
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
                                    id="correo" value="{{isset($user)? $user->correo: old('correo') }}">

                                    @error('correo')
                                        <div  class= class="invalid-feedback">
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
                                    id="phone" value="{{isset($user)? $user->telefono: old('telefono') }}">

                                    @error('telefono')
                                        <div class= class="invalid-feedback">
                                            <ul style="list-style: none; padding: 0;">
                                                <p>{{$message}}</p>
                                            </ul>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password" class="col-sm-4 col-form-label text-end">Contraseña</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" name="password" class="form-control {{$errors->has('password')?'is-invalid':''}}"
                                        id="password" value="{{isset($user)? $user->password: old('password') }}">
                                        <div class="input-group-text">

                                            <i class="fas fa-eye" onclick="togglePasswordVisibility('password')"></i>
                                        </div>
                                    </div>
                                    @error('password')
                                        <div class= class="invalid-feedback">
                                            <ul style="list-style: none; padding: 0;">
                                                <p>{{$message}}</p>
                                            </ul>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="confirm-password" class="col-sm-4 col-form-label text-end">Confirmar contraseña</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="password_confirmation" name="password_confirmation" {{ isset($usuario) ? 'disabled' : '' }}>
                                        <div class="input-group-text">
                                            <i class="fas fa-eye" onclick="togglePasswordVisibility('password_confirmation')"></i>
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
                                    <button type="submit" href="" class="btn btn-primary-pk btn-block w-100"">Guardar</button>
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
