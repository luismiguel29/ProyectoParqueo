<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  @extends('layout.welcome')
  @section ('content')
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
                        <input name="nombre" class="form-control" id="inputNombre3" value="{{isset($user)? $user->nombre: old('nombre') }}">
                      </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputApellidos3" class="col-sm-4 col-form-label text-end" >Apellidos</label>
                        <div class="col-sm-7">
                          <input name="apellido" class="form-control" id="inputApellidos3" value="{{isset($user)? $user->apellido: old('apellido') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputUsuario3" class="col-sm-4 col-form-label text-end">Usuario</label>
                        <div class="col-sm-7">
                          <input name="usuario" class="form-control" id="inputUsuario3" value="{{isset($user)? $user->usuario: old('usuario') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputCedula3" class="col-sm-4 col-form-label text-end">Cedula</label>
                        <div class="col-sm-7">
                          <input name="ci" class="form-control" id="inputCedula3" value="{{isset($user)? $user->ci: old('ci') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputTelefono3" class="col-sm-4 col-form-label text-end">Telefono</label>
                        <div class="col-sm-7">
                          <input name="telefono" class="form-control" id="inputTelefono3" value="{{isset($user)? $user->telefono: old('telefono') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputCorreo3" class="col-sm-4 col-form-label text-end">Correo</label>
                        <div class="col-sm-7">
                          <input name="correo" class="form-control" id="inputCorreo3" value="{{isset($user)? $user->correo: old('correo') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputContraseña3" class="col-sm-4 col-form-label text-end">Contraseña</label>
                        <div class="col-sm-7">
                          <input name="contraseña" class="form-control" id="inputContraseña3" value="{{isset($user)? $user->contraseña: old('contraseña') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputRepetirContraseña3" class="col-sm-4 col-form-label text-end">Repetir Contraseña</label>
                        <div class="col-sm-7">
                          <input name="repetirContraseña" class="form-control" id="inputRepetirContraseña3" value="{{isset($user)? $user->repetirContraseña: old('repetirContraseña') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputTipoDeVehiculo3" class="col-sm-4 col-form-label text-end">Tipo de Vehiculo</label>
                        <div class="col-sm-7">
                        <select name="tipo_vehiculo" class="form-select" aria-label="Default select example">
                                <option {{isset($user)? 'selected':""}}>Seleccione una opcion</option>
                                <option value="movilidad" {{(isset($user)&& $user->tipo_vehiculo =="movilidad" )? 'selected':''}}>Movilidad</option>
                                <option value="motocicleta" {{(isset($user)&& $user->tipo_vehiculo =="motocicleta" )? 'selected':''}}>Motocicleta</option>
                              </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumeroDePlaca3" class="col-sm-4 col-form-label text-end">Numero de placa</label>
                        <div class="col-sm-7">
                          <input name="placa" class="form-control" id="inputNumeroDePlaca3" value="{{isset($user)? $user->placa: old('placa') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputMarca3" class="col-sm-4 col-form-label text-end">Marca</label>
                        <div class="col-sm-7">
                          <input name="marca" class="form-control" id="inputMarca3" value="{{isset($user)? $user->marca: old('marca') }}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputColor3" class="col-sm-4 col-form-label text-end">Color</label>
                        <div class="col-sm-7">
                          <input name="color" class="form-control" id="inputColor3" value="{{isset($user)? $user->color: old('color') }}">
                        </div>
                      </div>
                    <div class="row mb-3">
                      <label for="inputModelo3" class="col-sm-4 col-form-label text-end">Modelo</label>
                      <div class="col-sm-7">
                        <input name="modelo" class="form-control" id="inputModelo3" value="{{isset($user)? $user->modelo: old('modelo') }}">
                      </div>
                    </div>
  
                    <div class="row row-gap-3 pt-4 ">
                      <div class="col-md-6">
                          <button type="submit" href="" class="btn btn-primary-pk btn-block w-100" >Registrar</button>
                      </div>
                      <div class="col-md-6">
                          <a type="reset" class="btn btn-danger-dg btn-block w-100"   href="{{route('Cliente.listacliente')}}">
                              Cancelar
                          </a>
                         
                      </div></div>
  
  
                    <!--<button type="submit" class="btn btn-primary" >Guardar</button>-->
                    <!--<a type="button" class="btn btn-primary" href="{{route('Cliente.listacliente')}}">Salir</a>-->
                  </form>
                  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
                    
            </div>
  
        </div>
  
    </div>
  </div>
  
  @endsection
</body>
</html>

