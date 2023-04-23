@extends('welcome')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/luiscss/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="containera pb-3">
                    <i class="fa-solid fa-clock fa-2x pe-1"></i>
                    <span class="h3 ">Creación de horarios</span>
                </div>

                <form action="" method="post" >
                    @csrf
                    <div class="card card-outline  border-top-pk   shadow">
                        <div class="row overflow-hidden">
                            <div class="col p-3">
                                <label class="p-2" for="">Hora de inicio</label>
                                <input class="form-control" type="time" name="h_apertura" value="{{ $datos->h_apertura }}">
                            </div>
                    
                            <div class="col p-3">
                                <label class="p-2" for="">Hora de cierre</label>
                                <input class="form-control" type="time" name="h_cierre" value="{{ $datos->h_cierre }}">
                            </div>
                            <div class="col p-3">
                                <label class="p-2" for="">Día</label>
                                <select class="form-select" id="" name="dia">
                                    <option value="lunes">Lunes</option>
                                    <option value="martes">Martes</option>
                                    <option value="miercoles">Miercoles</option>
                                    <option value="jueves">Jueves</option>
                                    <option value="viernes">Viernes</option>
                                    <option value="sabado">Sabado</option>
                                    <option value="domingo">Domingo</option>
                                </select>
                            </div>
                    
                        </div>
                        <div class="btn-group">
                            <div class="col d-grid p-3">
                                <button type="submit" class="btn btn-primary" style="background: #0009B5">Actualizar</button>
                            </div>
                            <div class="col d-grid p-3">
                                <a href="{{ route('lista') }}" class="btn btn-danger" style="background: #FF3346">Cancelar</a>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</body>

</html>

    
@endsection