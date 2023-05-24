<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/ConfiguracionParqueo/listSite.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

@extends('welcome')
@section('content')
    <section>
        <div class="container-fluid parkingSite">
            <div class="row ">
                <div class="col-12 col-sm pb-3">
                    <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                    <span class="h3">Lista de sitios ZONA B</span>
                </div>


            </div>

            <div class="card card-outline  border-top-pk   shadow">
                <form action="{{ route('enviarSolicitud.store') }}" method="post" class="card-body"
                    style="display: block;">
                    <!--'ConfiguracionParqueo/crear.store'-->
                    @csrf
                    @method('post')
                    <div class="row row-1">
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Nombre del sitio</label>
                                <input type="text"
                                    class="form-control {{ $errors->has('nroespacio') ? 'is-invalid' : '' }}"
                                    name="nombre_sitio">
                                @error('nroespacio')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-3">
                            <div class="form group">
                                <label for="">Precio</label>
                                <input type="number"
                                    class="form-control {{ $errors->has('nroespacio') ? 'is-invalid' : '' }}"
                                    name="precio">
                                @error('nroespacio')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">

                            <button type="submit" href=""
                                class="btn btn-primary-pk btn-block w-100">Registrar</button>

                        </div>

                    </div>
                    <br>

                </form>


                <div class="row">
                    <div class="col-lg-5">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed" style="width: 100%">
                                <thead>
                                    <!--<thead class="text-center">-->
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre del sitio</th>
                                        <th>Precio</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($horarios as $horario)
                                        <tr>
                                            
                                            <td>{{ $horario->id}}</td>
                                            <td>{{ $horario->nombre}}</td>
                                            <td>{{ $horario->precio }}</td>
                                            <td>
                                        
                                                <div class="d-flex justify-content-between">
                                                    <div class="imgAction">
                                                        <button type="submit" class="bicon icon--blue" data-bs-toggle="modal"
                                                        data-bs-target="#modal-update-">
                                                        <i class="fa-solid fa-pen-to-square icon--white"></i>
                                                    </button>
                                                    </div>    
                                                    <div class="imgAction">
                                                        <button type="submit" class="bicon icon--red" data-bs-toggle="modal"
                                                            data-bs-target="#modal-delete-{{ $horario->id }}">
                                                            <i class="fa-solid fa-xmark icon--white"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('AtencionSolicitud.deleteHorario')
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


</html>
