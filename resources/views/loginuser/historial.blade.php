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
            <div class="row">
                <div class="row">
                    <div class="col mt-3">
                        <i class="fa-solid fa-calendar-days fa-2x pe-2"></i>
                        <span class="h3 ">Historial de reportes</span>
                    </div>
                    <form action="{{ route('buscarHistorial') }}" method="GET">
                    {{-- <form action="{{ route('registroHistorial') }}" method="POST"> --}}
                        @csrf
                        <div class="row p-3">
                            <div class="col-sm-2">
                                <label for="" class="p-2">Desde:</label>
                                <input class="form-control {{$errors->has('fechaini')?'is-invalid':''}}" type="date" name="fechaini" value=" {{ old('fechaini') }}">
                                @error('fechaini')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label for="" class="p-2">Hasta:</label>
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
                    
                    <div class="table-responsive card card-outline  border-top-pk   shadow">
                        @if ($historial->isNotEmpty())
                            <table class="table table-striped mt-3 ">
                                <thead class="p-3">
                                    <tr>
                                        <th>Usuario</th>
                                        <th>Fecha Realizada</th>
                                        <th>Fecha Inicial</th>
                                        <th>Fecha Final</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($historial as $item)
                                        <tr>
                                            <td>{{ $item->usuarioNom->nombre }}</td>
                                            <td>{{ $item->fecha }}</td>
                                            <td>{{ $item->fechaini }}</td>
                                            <td>{{ $item->fechafin }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="alert alert-dark m-4" role="alert">¡No se encuentra reportes generados del dia!
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
