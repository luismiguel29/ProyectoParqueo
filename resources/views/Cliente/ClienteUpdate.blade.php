
@extends('welcome')
@section ('content')<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/Cliente/form.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>TIS</title>
</head>
<body>
  
  <div class="container py-3">
    <div class="d-flex justify-content-center">
        <div class="col-lg-6">
            <div class="container pb-3">
                <i class="fa-solid fa-user fa-2xl"; style="color: 222222;
                margin-right: 10px;"></i>
                <span class="h3 ">Actualizar datos de cuenta</span>
            </div>
            @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
            <div class="card card-outline  border-top-pk   shadow" >
                <form method="POST" action="{{ route('actualizarCuenta', $cuenta->id) }}" style="padding: 50px 55px" >
                  @csrf
                  @method('PUT')
                      <div class="row mb-3">
                        <label for="inputUsuario3" class="col-sm-4 col-form-label text-end">Usuario</label>
                        <div class="col-sm-7">
                          <input name="usuario" class="form-control {{$errors->has('usuario')?'is-invalid':''}}" id="inputUsuario3" value="{{ $cuenta->usuario }} ">
                          @error('usuario')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputTelefono3" class="col-sm-4 col-form-label text-end">Telefono</label>
                        <div class="col-sm-7">
                          <input name="telefono" class="form-control {{$errors->has('telefono')?'is-invalid':''}}" id="inputTelefono3" value="{{ $cuenta->telefono }}">
                          @error('telefono')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputCorreo3" class="col-sm-4 col-form-label text-end">Correo</label>
                        <div class="col-sm-7">
                          <input name="correo" class="form-control {{$errors->has('correo')?'is-invalid':''}}" id="inputCorreo3" value="{{ $cuenta->correo }}">
                          @error('correo')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      @if (!isset ($user ))
                        
                      <div class="row mb-3">
                        <label for="inputContraseña3" class="col-sm-4 col-form-label text-end">Contraseña</label>
                        <div class="col-sm-7">
                          <input name="contraseña" class="form-control {{$errors->has('contraseña')?'is-invalid':''}}" id="inputContraseña3" value="">
                          
                          @error('contraseña')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      @endif
  
                    <div class="row row-gap-3 pt-4 ">
                      <div class="col-md-6 mx-auto d-grid">
                          <button type="submit" href="" class="btn btn-primary-pk btn-block w-100" >Actualizar</button>
                      </div>
                    </div>
  
                  </form>
                       
            </div>
        </div>
    </div>
  </div>
</body>
</html>
@endsection
