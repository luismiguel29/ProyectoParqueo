@extends('welcome')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <div class="row">
                <div class="col p-3" >
                    <i class="fa-solid fa-clock fa-2x pe-1"></i>
                    <span class="h3 ">Gestión de horarios</span>
                </div>
                <div class="col p-3 text-end" >
                    <a href="\horario" class="btn btn-primary "><i class="fa-solid fa-plus" style="color: #ffffff;"></i> Agregar</a>
                </div>

                <div class="card card-outline  border-top-pk   shadow">
                    <table class="table table-bordered table-hover mt-3">
                        <thead class="p-3">
                            <tr>
                                <th>#</th>
                                <th>Hora inicio</th>
                                <th>Hora cierre</th>
                                <th>Día</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($horario as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->h_apertura }}</td>
                                <td>{{ $item->h_cierre }}</td>
                                <td scope='row'>{{ $item->dia }}</td>
                                <td scope='row' class="row text-center" style="margin: 0 auto">                                    
                                    <form class="col" action="{{ route('horarioupdate', $item->id) }}" method="POST">
                                        @csrf
                                        @method('get')
                                        <button type="submit" class="fa-solid fa-pen-to-square fa-xl" type='button' style="color: #0009B5; border: none"></button>
                                    </form>
                                    <form class="col" action="{{ route('eliminarhorario', $item->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="fa-solid fa-trash-can fa-xl" type='button' style="color: #FF3346; border: none"></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>

</html>

    
@endsection