@extends('welcome')
@section('head')
        <link rel="stylesheet" href="{{ asset('css/Cliente/listacliente.css') }}">
        <link rel="stylesheet" href="{{ asset('css/Cliente/modalbotones.css') }}">
@endsection
@section('content')


        <div class="container-fluid py-3">
            <div class="row">
                <div class="row">
                    <div class="col mt-3">
                    <h4 class="text mb-0"><i class="fa-solid fa-file-pdf fa-xl"></i> Gestión de Reportes</h4>
                    </div> 
                    <form action="{{ route('Reportes.buscarreportes') }}" method="GET">
                        @csrf
                        <div class="row p-3">
                            <div class="col-sm-2">
                                <label for="" class="p-2">Inicio:</label>
                                <input class="form-control {{$errors->has('fechaini')?'is-invalid':''}}" type="date" name="fechaini" value=" {{ old('fechaini') }}">
                                @error('fechaini')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2">
                                <label for="" class="p-2">Fin:</label>
                                <input class="form-control {{$errors->has('fechafin')?'is-invalid':''}}" type="date" name="fechafin" value=" {{ old('fechafin') }}">
                                @error('fechafin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-sm-2 my-auto d-grid">
                                <button class="btn btn-primary-pk mt-sm-4" >Buscar</button>

                            </div>
                        </div>
                    </form>
                    
                    <div class="table-responsive card card-outline  border-top-pk   shadow">
                        @if (!empty ($reportes))
                            <table class="table table-striped mt-3 ">
                                <thead class="p-3">
                                    <tr>
                                        <th>Sitio</th>
                                        <th>Usuario</th>
                                        <th>Fecha Asigignacion</th>
                                        <th>Estado/Pago</th>
                                        <th>Total Pagado</th>
                                        <th>Total Pendiente</th>
                                        <th>Cant. Vehiculos</th>
                                        <th>Tiempo Uso</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reportes as $item)
                                        <tr>
                                            <td>{{ $item->sitio }}</td>
                                            <td>{{ $item->nombre }}</td>
                                            <td>{{ $item->fechaasig }}</td>
                                            <td>{{ $item->Estado_Pago }}</td>
                                            <td>{{ $item->total_pagado }}</td>
                                            <td>{{ $item->total_pendiente }}</td>
                                            <td>{{ $item->cantidad_vehiculos }}</td>
                                            <td>{{ $item->tiempo_uso }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <div class="alert alert-dark m-4" role="alert">¡No existen reportes de ingresos!
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
@endsection
