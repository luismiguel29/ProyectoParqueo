
@extends('layout.welcome')
@section ('Contenido')
<div class="d-flex justify-content-around " >
    <div>
      <div class="contenedor" style="width: 35px; height:35px; left:320px; top:100px"><i class="fa-solid fa-user"></i></div> 
      <h1 style="font-size:16px; font-family:'Inter'; text-aligin:center;line-height:20px; font-style:normal; color:#222222; width: 137px;
      height: 20px; left: 373px; top: 108px;"><b>Registrar Usuario Cliente</b></h1>
    </div>
    <div class="container m-3 border rounded" style="box-shadow: 0px 4px 4px rgba(0,0,0,0.25); backdrop-filter: blur(2px); border-top-color:#0256CE !important;" > 
    <form method="POST" action="{{isset($user)? route( 'Cliente.editardato', ['id'=>$user->id]) : route('Cliente.guardar')}}" style="padding: 50px 55px">
      @csrf
      @if(isset($user))
      @method('put')
      @endif
        <div class="row mb-3">
          <label for="inputNombre3" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-3">
            <input name="nombre" class="form-control" id="inputNombre3" value="{{isset($user)? $user->nombre: old('nombre') }}">
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputApellidos3" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-3">
              <input name="apellido" class="form-control" id="inputApellidos3" value="{{isset($user)? $user->apellido: old('apellido') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputUsuario3" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-3">
              <input name="usuario" class="form-control" id="inputUsuario3" value="{{isset($user)? $user->usuario: old('usuario') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputCedula3" class="col-sm-2 col-form-label">Cedula</label>
            <div class="col-sm-3">
              <input name="ci" class="form-control" id="inputCedula3" value="{{isset($user)? $user->ci: old('ci') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputTelefono3" class="col-sm-2 col-form-label">Telefono</label>
            <div class="col-sm-3">
              <input name="telefono" class="form-control" id="inputTelefono3" value="{{isset($user)? $user->telefono: old('telefono') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputCorreo3" class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-3">
              <input name="correo" class="form-control" id="inputCorreo3" value="{{isset($user)? $user->correo: old('correo') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputContraseña3" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-3">
              <input name="contraseña" class="form-control" id="inputContraseña3" value="{{isset($user)? $user->contraseña: old('contraseña') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputRepetirContraseña3" class="col-sm-2 col-form-label">Repetir Contraseña</label>
            <div class="col-sm-3">
              <input name="repetirContraseña" class="form-control" id="inputRepetirContraseña3" value="{{isset($user)? $user->repetirContraseña: old('repetirContraseña') }}">
            </div>
          </div>
          <div class="row mb-2">
            <label for="inputTipoDeVehiculo3" class="col-sm-2 col-form-label">Tipo de Vehiculo</label>
            <div class="col sm-2">
            <select name="tipo_vehiculo" class="form-select" aria-label="Default select example" style="width:30%">
                    <option {{isset($user)? 'selected':""}}>Seleccione una opcion</option>
                    <option value="movilidad" {{(isset($user)&& $user->tipo_vehiculo =="movilidad" )? 'selected':''}}>Movilidad</option>
                    <option value="motocicleta" {{(isset($user)&& $user->tipo_vehiculo =="motocicleta" )? 'selected':''}}>Motocicleta</option>
                  </select>
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputNumeroDePlaca3" class="col-sm-2 col-form-label">Numero de placa</label>
            <div class="col-sm-3">
              <input name="placa" class="form-control" id="inputNumeroDePlaca3" value="{{isset($user)? $user->placa: old('placa') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputMarca3" class="col-sm-2 col-form-label">Marca</label>
            <div class="col-sm-3">
              <input name="marca" class="form-control" id="inputMarca3" value="{{isset($user)? $user->marca: old('marca') }}">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputColor3" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-3">
              <input name="color" class="form-control" id="inputColor3" value="{{isset($user)? $user->color: old('color') }}">
            </div>
          </div>
        <div class="row mb-3">
          <label for="inputModelo3" class="col-sm-2 col-form-label">Modelo</label>
          <div class="col-sm-3">
            <input name="modelo" class="form-control" id="inputModelo3" value="{{isset($user)? $user->modelo: old('modelo') }}">
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary" >Guardar</button>
        <a type="button" class="btn btn-primary" href="{{route('Cliente.lista')}}">Salir</a>
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
    @endsection
