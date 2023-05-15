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
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="row">
                <div class="row">
                    <div class="col">
                        <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                        <span class="h3 ">Gestión Entradas/Salidas de Vehiculos</span>
                    </div>
                    <div class="row mt-2" style="">
                        <div class="col col-6 p-2">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Numero de placa">
                                <span class="input-group-text" id="basic-addon2">Buscar</span>
                            </div>
                        </div>
                        <form action="{{ route('agregarregistro') }}" method="POST">
                            @csrf
                            <div class="col  p-2 text-end">
                                <button type="submit" class="btn btn-primary-pk" href=""><i class="fa-solid fa-plus"
                                        style="color: #ffffff;"></i>
                                    Ingreso</button>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col col-4">
                            <select class="form-select">
                                <option value="">4756rty</option>
                                <option value="">5566srt</option>
                                <option value="">2548tru</option>
                            </select>
                        </div>
                    </div>

                    <div class="table-responsive card card-outline  border-top-pk   shadow">
                        @if ($listaregistro->isNotEmpty())
                            <table class="table table-striped mt-3 ">
                                <thead class="p-3">
                                    <tr>
                                        <th>Sitio</th>
                                        <th>Placa</th>
                                        <th>Ingreso</th>
                                        <th>Salida</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaregistro as $reg)
                                        <tr>
                                            <td>{{ $reg->sitio }}</td>
                                            <td>{{ $reg->placa }}</td>
                                            <td>{{ $reg->ingreso }}</td>
                                            <td>{{ $reg->salida }}</td>
                                            <td>
                                                <form action="{{ route('editarregistro', $reg->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="d-inline-block">
                                                        <button type="submit"
                                                            class="btn btn-danger-dg btn-sm">Salida</button>
                                                    </div>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-dark">No existen registros de Entradas/Salidas</div>
                        @endif
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
