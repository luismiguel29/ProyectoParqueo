@extends('welcome')
@section('content')
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/listahorario.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/boton.css') }}">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
                    <div class="row mt-2 p-2" style="">
                        <div class="col col-sm-3 p-2">
                            <select class="livesearch form-control" name="livesearch"></select>
                        </div>
                        <div class="col-sm p-2 text-end">
                            <form action="{{ route('agregarregistro') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary-pk" href=""><i class="fa-solid fa-plus"
                                        style="color: #ffffff;"></i>
                                    Ingreso</button>
                            </form>
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


        <script type="text/javascript">
            $('.livesearch').select2({
                placeholder: 'Select movie',
                ajax: {
                    url: '/ajax-autocomplete-search',
                    dataType: 'json',
                    delay: 250,
                    processResults: function (data) {
                        return {
                            results: $.map(data, function (item) {
                                return {
                                    text: item.placa,
                                    id: item.id
                                }
                            })
                        };
                    },
                    cache: true
                }
            });
        </script>
    </body>

    
    </html>
@endsection
