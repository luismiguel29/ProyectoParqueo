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
                <h4 class="text mb-4"><i class="fas fa-bullhorn"></i> Registrar reclamos</h4>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="form-container">
                    <form action="{{ route('reclamo.store') }}" method="post">

                        @csrf
                        <div class="form-group">
                            <label for="tipo_mensaje">Elegir tipo de mensaje</label>
                            <select class="form-select" id="tipo_mensaje" name="tipo_mensaje">
                                <option>Espacio de estacionamiento ocupado</option>
                                <option>Daños en el vehículo</option>
                                <option>Acceso restringido</option>
                                <option>Iluminación inadecuada</option>
                                <option>Mala señalización</option>
                                <option>Mal estado de las instalaciones</option>
                                <option>Cobro incorrecto</option>
                            </select>
                        </div>


                        <style>
                            #descripcion {
                                width: 100%;   /* o puedes utilizar un valor en píxeles como '500px' */
                                height: 300px; /* o puedes utilizar un valor en porcentaje como '50%' */
                            }
                        </style>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
                        </div>



                        <div class="row row-gap-3 pt-4 ">
                            <div class="col-md-6">
                                <button type="submit" href="" class="btn btn-primary-pk btn-block w-100"">Registrar</button>
                            </div>
                            <div class="col-md-6">
                                <a href="{{ route('reclamo') }}" class="btn btn-danger-dg btn-block w-100">
                                    Cancelar
                                </a>
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
