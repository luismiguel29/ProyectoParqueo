@extends('welcome')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/listahorario.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/boton.css') }}">
    </head>

    <body>
        <div class="container-fluid py-3">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="row">
                    <div class="col p-3">
                        <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                        <span class="h3 ">Gestión de Vehiculos</span>
                    </div>
                    <div class="col p-3 text-end">
                        <a class="btn btn-primary-pk" href="{{ route('registrarvehiculo') }}"><i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                            Agregar</a>
                    </div>

                    <div class="table-responsive card card-outline  border-top-pk   shadow">
                        @if ($vehiculo->isNotEmpty())
                            <table class="table table-striped mt-3 ">
                                <thead class="p-3">
                                    <tr>
                                        <th>Placa</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Color</th>
                                        <th>Tipo</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($vehiculo as $item)
                                        <tr>
                                            <td>{{ $item->placa }}</td>
                                            <td>{{ $item->marca }}</td>
                                            <td>{{ $item->modelo }}</td>
                                            <td>{{ $item->color }}</td>
                                            <td>{{ $item->tipo }}</td>
                                            <td>
                                                <div class="d-inline-block">
                                                    <a href="{{ route('vistaeditarvehiculo', $item->id) }}" type=""
                                                        class="bicon icon--blue"><i
                                                            class="fa-solid fa-pen-to-square icon--white"></i></a>
                                                </div>

                                                <div class="d-inline-block offset-sm-1">
                                                    <button type="button" class="bicon icon--red" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal-{{ $item->id }}">
                                                        <i class="fa-solid fa-trash-can icon--white"></i>
                                                    </button>
                                                </div>


                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal-{{ $item->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    ¡Atención!
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">Esta seguro de eliminar el vehiculo?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary-pk"
                                                                    data-bs-dismiss="modal">Cerrar</button>
                                                                
    
                                                                <form action="{{ route('eliminarvehiculo', $item->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="btn btn-danger-dg"
                                                                    style="">Eliminar</button>
                                                                </form>
    
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="alert alert-dark m-4" role="alert">¡No existen vehiculos registrados!
                                    </div>
                        @endif

                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>




        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>
    </body>



    </body>

    </html>
@endsection
