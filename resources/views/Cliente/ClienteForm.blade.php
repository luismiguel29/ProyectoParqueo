
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
                <span class="h3 ">Registar Usuario Cliente</span>
            </div>
            <div class="card card-outline  border-top-pk   shadow" >
                <div class="card-header">
                    <h5>Formulario</h5>
                </div>
                <form method="POST" action="{{isset($user)? route( 'Cliente.editardato', ['id'=>$user->id]) : route('Cliente.guardar')}}" style="padding: 50px 55px" >
                  @csrf
                  @if(isset($user))
                  @method('put')
                  @endif
                    <div class="row mb-3">
                      <label for="inputNombre3" class="col-sm-4 col-form-label text-end">Nombre</label>
                      <div class="col-sm-7">
                        <input name="nombre" class="form-control {{$errors->has('nombre')?'is-invalid':''}}" id="inputNombre3" value="{{isset($user)? $user->nombre: old('nombre') }}">
                            @error('nombre')
                                  <div class="invalid-feedback">
                                         {{ $message }}
                                  </div>
                            @enderror
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputApellidos3" class="col-sm-4 col-form-label text-end" >Apellidos</label>
                        <div class="col-sm-7">
                          <input name="apellido" class="form-control {{$errors->has('apellido')?'is-invalid':''}}" id="inputApellidos3" value="{{isset($user)? $user->apellido: old('apellido') }}">
                          @error('apellido')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputUsuario3" class="col-sm-4 col-form-label text-end">Usuario</label>
                        <div class="col-sm-7">
                          <input name="usuario" class="form-control {{$errors->has('usuario')?'is-invalid':''}}" id="inputUsuario3" value="{{isset($user)? $user->usuario: old('usuario') }}">
                          @error('usuario')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputCedula3" class="col-sm-4 col-form-label text-end">Cedula</label>
                        <div class="col-sm-7">
                          <input name="ci" class="form-control {{$errors->has('ci')?'is-invalid':''}}" id="inputCedula3" value="{{isset($user)? $user->ci: old('ci') }}">
                          @error('ci')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputTelefono3" class="col-sm-4 col-form-label text-end">Telefono</label>
                        <div class="col-sm-7">
                          <input name="telefono" class="form-control {{$errors->has('telefono')?'is-invalid':''}}" id="inputTelefono3" value="{{isset($user)? $user->telefono: old('telefono') }}">
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
                          <input name="correo" class="form-control {{$errors->has('correo')?'is-invalid':''}}" id="inputCorreo3" value="{{isset($user)? $user->correo: old('correo') }}">
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
                          <input name="contraseña" class="form-control {{$errors->has('contraseña')?'is-invalid':''}}" id="inputContraseña3" value="{{isset($user)? $user->contraseña: old('contraseña') }}">
                          
                          @error('contraseña')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      @endif
                      <!--<div class="row mb-3">
                        <label for="inputRepetirContraseña3" class="col-sm-4 col-form-label text-end">Repetir Contraseña</label>
                        <div class="col-sm-7">
                          <input name="repetirContraseña" class="form-control" id="inputRepetirContraseña3" value="{{isset($user)? $user->repetirContraseña: old('repetirContraseña') }}">
                        </div>
                      </div>-->
                      <div class="row mb-3">
                        <label for="inputTipoDeVehiculo3" class="col-sm-4 col-form-label text-end">Tipo de Vehiculo</label>
                        <div class="col-sm-7">
                        <select name="tipo_vehiculo" class="form-select {{$errors->has('tipo_vehiculo')?'is-invalid':''}}" aria-label="Default select example">
                                <option {{isset($user)? 'selected':""}}>Seleccione una opcion</option>
                                <option value="movilidad" {{(isset($user)&& $user->tipo_vehiculo =="movilidad" )? 'selected':''}}>Movilidad</option>
                                <option value="motocicleta" {{(isset($user)&& $user->tipo_vehiculo =="motocicleta" )? 'selected':''}}>Motocicleta</option>
                              </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumeroDePlaca3" class="col-sm-4 col-form-label text-end">Numero de placa</label>
                        <div class="col-sm-7">
                          <input name="placa" class="form-control {{$errors->has('placa')?'is-invalid':''}}" id="inputNumeroDePlaca3" value="{{isset($user)? $user->placa: old('placa') }}">
                          @error('placa')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputMarca3" class="col-sm-4 col-form-label text-end">Marca</label>
                        <div class="col-sm-7">
                          <input name="marca" class="form-control {{$errors->has('marca')?'is-invalid':''}}" id="inputMarca3" value="{{isset($user)? $user->marca: old('marca') }}">
                          @error('marca')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputColor3" class="col-sm-4 col-form-label text-end">Color</label>
                        <div class="col-sm-7">
                          <input name="color" class="form-control {{$errors->has('color')?'is-invalid':''}}" id="inputColor3" value="{{isset($user)? $user->color: old('color') }}">
                          @error('color')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label for="inputModelo3" class="col-sm-4 col-form-label text-end">Modelo</label>
                      <div class="col-sm-7">
                        <input name="modelo" class="form-control {{$errors->has('modelo')?'is-invalid':''}}" id="inputModelo3" value="{{isset($user)? $user->modelo: old('modelo') }}">
                        @error('modelo')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>
                    </div>
  
                    <div class="row row-gap-3 pt-4 ">
                      <div class="col-md-6">
                          <button type="submit" href="" class="btn btn-primary-pk btn-block w-100" >Registrar</button>
                      </div>
                      <div class="col-md-6">
                          <a type="reset" class="btn btn-danger-dg btn-block w-100"   href="{{route('Cliente.listacliente')}}">Cancelar</a>
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
