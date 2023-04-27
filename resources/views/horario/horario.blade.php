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
                <div class="col-lg-6">
                    <div class="containera pb-3">
                        <i class="fa-solid fa-clock fa-2x pe-1"></i>
                        <span class="h3 ">Creación de horarios</span>
                    </div>


                    <form action="{{ route('horario.store') }}" method="post">
                        @csrf

                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif --}}


                        <div class="card card-outline  border-top-pk   shadow">
                            <div class="row overflow-hidden">
                                <div class="col p-3">
                                    <label for="validate" class="p-2" for="">Hora de inicio</label>
                                    <input class="form-control {{$errors->has('h_apertura')?'is-invalid':''}}" id="validate" type="time" name="h_apertura" value="{{ old('h_apertura') }}">
                                    @error('h_apertura')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col p-3">
                                    <label class="p-2" for="">Hora de cierre</label>
                                    <input class="form-control {{$errors->has('h_cierre')?'is-invalid':''}}" type="time" name="h_cierre" value="{{ old('h_cierre') }}">
                                    @error('h_cierre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col p-3">
                                    <label class="p-2" for="">Día</label>
                                    <select class="form-select {{$errors->has('dia')?'is-invalid':''}}" id="" name="dia">
                                        <option value="">Selecionar</option>
                                        <option value="Lunes">Lunes</option>
                                        <option value="Martes">Martes</option>
                                        <option value="Miercoles">Miercoles</option>
                                        <option value="Jueves">Jueves</option>
                                        <option value="Viernes">Viernes</option>
                                        <option value="Sabado">Sabado</option>
                                        <option value="Domingo">Domingo</option>
                                    </select>
                                    @error('dia')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="btn-group">
                                <div class="col d-grid p-3">
                                    <button type="submit" class="btn btn-primary-pk"
                                        >Registrar</button>
                                </div>
                                <div class="col d-grid p-3">
                                    <a href="{{ route('lista') }}" class="btn btn-danger-dg"
                                        >Cancelar</a>
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
