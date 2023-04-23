@extends('layout.welcome')

@section('Contenido')
<body>
    <div class="container m-3 border rounded" style="box-shadow: 0px 9px 20px 3px rgba(0,0,0,0.1);" >
    <form>
        <div class="row mb-5">
          <label for="inputNombre3" class="col-sm-2 col-form-label">Nombre</label>
          <div class="col-sm-3">
            <input type="nombre" class="form-control" id="inputNombre3">
          </div>
        </div>
        <div class="row mb-3">
            <label for="inputApellidos3" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-3">
              <input type="apellidos" class="form-control" id="inputApellidos3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputUsuario3" class="col-sm-2 col-form-label">Usuario</label>
            <div class="col-sm-3">
              <input type="usuario" class="form-control" id="inputUsuario3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputCedula3" class="col-sm-2 col-form-label">Cedula</label>
            <div class="col-sm-3">
              <input type="cedula" class="form-control" id="inputCedula3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputTelefono3" class="col-sm-2 col-form-label">Telefono</label>
            <div class="col-sm-3">
              <input type="Telefono" class="form-control" id="inputTelefono3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputCorreo3" class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-3">
              <input type="correo" class="form-control" id="inputCorreo3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputContraseña3" class="col-sm-2 col-form-label">Contraseña</label>
            <div class="col-sm-3">
              <input type="Contraseña" class="form-control" id="inputContraseña3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputRepetirContraseña3" class="col-sm-2 col-form-label">Repetir Contraseña</label>
            <div class="col-sm-3">
              <input type="repetirContraseña" class="form-control" id="inputRepetirContraseña3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputTipoDeVehiculo3" class="col-sm-2 col-form-label">Tipo de Vehiculo</label>
            <div class="col-sm-3">
              <input type="tipodevehiculo" class="form-control" id="inputTipoDeVehiculo3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputNumeroDePlaca3" class="col-sm-2 col-form-label">Numero de placa</label>
            <div class="col-sm-3">
              <input type="numerodeplaca" class="form-control" id="inputNumeroDePlaca3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputMarca3" class="col-sm-2 col-form-label">Marca</label>
            <div class="col-sm-3">
              <input type="marca" class="form-control" id="inputMarca3">
            </div>
          </div>
          <div class="row mb-3">
            <label for="inputColor3" class="col-sm-2 col-form-label">Color</label>
            <div class="col-sm-3">
              <input type="color" class="form-control" id="inputColor3">
            </div>
          </div>
        <div class="row mb-3">
          <label for="inputModelo3" class="col-sm-2 col-form-label">Modelo</label>
          <div class="col-sm-3">
            <input type="modelo" class="form-control" id="inputModelo3">
          </div>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Sign in</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
@endsection
