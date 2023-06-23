<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/ConfiguracionParqueo/crear.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="hold-transition sidebar-mini">
    @extends('welcome')
    @section('content')
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-6 border-grl">
                    <div class="container pb-3">
                        <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                        <span class="h3 ">Creación de sitios</span>
                    </div>

                    <div class="card card-outline border-top-pk   shadow">
                        <div class="card-header">
                            <h5>Ingrese todos los campos</h5>
                        </div>
                        <!--APARTIR DE AQUI ES EL BODY-->
                        <form action="{{ route('crear.store') }}" method="post" class="card-body" style="display: block;">
                            <!--'ConfiguracionParqueo/crear.store'-->
                            @csrf
                            @method('post')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Nro espacio
                                            <input 
                                                class="form-control {{ $errors->has('nroespacio') ? 'is-invalid' : '' }}"
                                                name="nroespacio">
                                            @error('nroespacio')
                                                <small style="color:red">{{ $message }}</small>
                                            @enderror
                                        </label>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form group">
                                        <label for="">Zona</label>
                                        <select name="zona" id="" class="form-select">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                        </select>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Observaciones</label>
                                    <textarea name="observacion" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row row-gap-3 pt-4 btn-grl">
                                <div class="col-md-6">
                                    <button type="submit" href=""
                                        class="btn btn-primary-pk btn-block w-100">Registrar</button>
                                </div>
                                <div class="col-md-6">
                                    <!--
                                    <button type="reset" class="btn btn-danger-dg btn-block w-100">
                                        Cancelar
                                    </button>
                                    -->
                                    <a href="\sites" class="btn btn-danger-dg btn-block w-100">
                                        <span>Cancelar</span>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    @endsection
</body>

</html>
