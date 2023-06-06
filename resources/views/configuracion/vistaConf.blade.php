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
        <link rel="stylesheet" href="{{ asset('css/luiscss/boton.css') }}">
    </head>

    <body>
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <div class="containera pb-3">
                        <i class="fa-solid fa-gear fa-2x"></i>
                        <span class="h3 ">Configuración</span>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('message'))
                        <div class="alert alert-danger">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ route('modificarConfiguracion') }}" method="POST">
                        @csrf
                        <input type="hidden" name="enUsoTarifa" value="{{ $enUsoTarifa->id }}">
                        <input type="hidden" name="enUsoConf" value="{{ $enUsoConf->id }}">
                        <div class="card card-outline  border-top-pk   shadow p-3">
                            <div class="row">
                                <label class="" for="">
                                    <h5>Tarifa:</h5>
                                </label>
                                <div class="col-6">
                                    <select class="form-select" name="tarifa" id="">
                                        @foreach ($tarifa as $item)
                                            <option @if ($item->estado == 1) selected @endif
                                                value="{{ $item->id }}">{{ $item->nombre }} - Monto bs.
                                                {{ $item->precio }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <label class="mt-2" for="">
                                    <h5>Fecha limite de pago:</h5>
                                </label>
                                <div class="col-6">
                                    <select class="form-select" name="fecha" id="">
                                        @foreach ($configuracion as $item2)
                                            <option @if ($item2->estado == 1) selected @endif
                                                value="{{ $item2->id }}">{{ $item2->dia }}, {{ $item2->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mt-3">
                                        <div class="col-sm-6 mx-auto d-grid p-3">
                                            <button type="submit" class="btn btn-primary-pk">Guardar cambios</button>
                                        </div>
                                    </div>
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
