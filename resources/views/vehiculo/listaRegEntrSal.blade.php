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
        <div class="container-fluid py-3">
            @if (session('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="row">
                    <div class="col">
                        <i class="fa-sharp fa-solid fa-right-left fa-2x pe-2"></i>
                        <span class="h3 ">Gestión Entradas/Salidas de Vehiculos</span>
                    </div>

                    @if (session()->get('sesion')->rol == 'administrador')
                        <form action="{{ route('buscarRegistro') }}" method="GET">
                        {{-- <form action="{{ route('registroHistorial') }}" method="POST"> --}}
                            @csrf
                            <div class="row p-3">
                                <div class="col-sm-2">
                                    <label for="">Hora de inicio</label>
                                    <input class="form-control {{$errors->has('fechaini')?'is-invalid':''}}" type="date" name="fechaini" value=" {{ old('fechaini') }}">
                                    @error('fechaini')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-2">
                                    <label for="">Hora final</label>
                                    <input class="form-control {{$errors->has('fechafin')?'is-invalid':''}}" type="date" name="fechafin" value=" {{ old('fechafin') }}">
                                    @error('fechafin')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-2 my-auto d-block">
                                    <button class="btn btn-primary-pk" >Buscar</button>
                                    {{-- <button type="submit" class="btn btn-primary-pk">Registrar reporte</button> --}}
                                </div>
                            </div>
                        </form>
                    @endif

                    <form action="{{ route('agregarregistro') }}" method="POST">
                        @csrf
                        <div class="row mt-2 p-2" style="">
                            <div class="col col-sm-3 p-2">
                                <select class="livesearch form-control {{ $errors->has('livesearch') ? 'is-invalid' : '' }}"
                                    name="livesearch" ></select>
                                @error('livesearch')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            @if (session()->get('sesion')->rol == 'guardia')
                            <div class="col-sm p-2 text-end">
                                <button type="submit" class="btn btn-primary-pk" href=""><i class="fa-solid fa-plus"
                                        style="color: #ffffff;"></i>
                                    Ingreso</button>
                            </div>
                            @endif
                        </div>
                    </form>

                    <div class="table-responsive card card-outline  border-top-pk   shadow">
                        @if ($listaregistro->isNotEmpty())
                            <table class="table table-striped mt-3 ">
                                <thead class="p-3">
                                    <tr>
                                        <th>Sitio</th>
                                        <th>Zona</th>
                                        <th>Placa</th>
                                        <th>Usuario</th>
                                        <th>Ingreso</th>
                                        <th>Salida</th>
                                        @if (session()->get('sesion')->rol == 'guardia')
                                        <th>Acción</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($listaregistro as $reg)
                                        <tr>
                                            <td>{{ $reg->sitio }}</td>
                                            <td>{{ $reg->zona }}</td>
                                            <td>{{ $reg->placa }}</td>
                                            <td>{{ $reg->propietario->nombre}}</td>
                                            <td>{{ $reg->ingreso }}</td>
                                            <td>{{ $reg->salida }}</td>
                                             @if (session()->get('sesion')->rol == 'guardia')
                                            <td>
                                                <form action="{{ route('editarregistro', $reg->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="d-inline-block">
                                                        <button type="submit" class="btn btn-danger-dg btn-sm"
                                                            @if ($reg->estado == 0) disabled @endif>Salida</button>
                                                    </div>
                                                </form>

                                            </td>
                                            @endif
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
                placeholder: 'Buscar placa',
                ajax: {
                    url: '/buscarplaca',
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.placa,
                                    id: item.id,
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
