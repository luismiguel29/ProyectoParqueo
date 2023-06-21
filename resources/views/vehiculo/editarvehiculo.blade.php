@extends('welcome')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
@section('content')

    <body>
        <div class="container-fluid mt-5">

            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <h4 class="text mb-4"><i class="fa-solid fa-car-side pe-2"></i> Editar datos de Vehiculo</h4>
                    <div class="form-container">

                        @foreach ($vehiculo as $item)
                            <form action="{{ route('editarvehiculo', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="user-type" class="col-sm-4 col-form-label text-end">Tipo de Vehiculo</label>
                                    <div class="col-sm-8">
                                        <select disabled class="form-select {{ $errors->has('tipo') ? 'is-invalid' : '' }}"
                                            id="user-type" name="tipo">
                                            <option value="{{ $item->tipo }}">{{ $item->tipo }}</option>
                                        </select>
                                        @error('tipo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username" class="col-sm-4 col-form-label text-end">Placa</label>
                                    <div class="col-sm-8">
                                        <input disabled type="text" name="placa"
                                            class="form-control {{ $errors->has('placa') ? 'is-invalid' : '' }}"
                                            id="first_name" value="{{ $item->placa }}">

                                        @error('placa')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-4 col-form-label text-end">Marca</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="marca"
                                            class="form-control {{ $errors->has('marca') ? 'is-invalid' : '' }}"
                                            id="last_name" value="{{ $item->marca }}">

                                        @error('marca')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-4 col-form-label text-end">Modelo</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="modelo"
                                            class="form-control {{ $errors->has('modelo') ? 'is-invalid' : '' }}"
                                            id="username" value="{{ $item->modelo }}">

                                        @error('modelo')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-sm-4 col-form-label text-end">Color</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="color"
                                            class="form-control {{ $errors->has('color') ? 'is-invalid' : '' }}"
                                            id="correo" value="{{ $item->color }}">

                                        @error('color')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row row-gap-3 pt-4 ">
                                    <div class="col-md-6">
                                        <button type="submit" href=""
                                            class="btn btn-primary-pk btn-block w-100">Actualizar</button>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="{{ route('listavehiculo') }}" class="btn btn-danger-dg btn-block w-100">
                                            Cancelar
                                        </a>

                                    </div>
                                </div>

                            </form>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>



    </body>

    </html>
@endsection
