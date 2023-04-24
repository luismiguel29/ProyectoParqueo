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
        <div class="container py-3">
            <div class="row">
                <div class="row">
                    <div class="col p-3">
                        <i class="fa-solid fa-clock fa-2x pe-1"></i>
                        <span class="h3 ">Gestión de horarios</span>
                    </div>
                    <div class="col p-3 text-end">
                        <a href="\horario" class="btn btn-primary "><i class="fa-solid fa-plus" style="color: #ffffff;"></i>
                            Agregar</a>
                    </div>

                    <div class="table-responsive card card-outline  border-top-pk   shadow">
                        <table class="table table-striped mt-3 ">
                            <thead class="p-3">
                                <tr>
                                    <th>ID</th>
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
                                        <td>{{ $item->dia }}</td>
                                        <td>
                                            <div class="d-inline-block">
                                                <a href="{{ route('horarioupdate', $item->id) }}" type="submit"
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
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">¡Atención!
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">Esta seguro de eliminar el horario?</div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary-pk"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                            

                                                            <form action="{{ route('eliminarhorario', $item->id) }}"
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
