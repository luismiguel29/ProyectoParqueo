<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/ConfiguracionParqueo/listSite.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

@extends('welcome')
@section('content')
    <section>
        <div class="container parkingSite">
            <div class="row ">
                <div class="col-12 col-sm pb-3">
                    <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                    <span class="h3">Lista de sitios ZONA B</span>
                </div>
                
                <div class="col-12 col-sm-auto d-flex gap-3 justify-content-center pb-3 pb-sm-0">
                    <!--DROPDOWN INICIO-->
                        <div class="dropdown col-auto">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Zonas
                            </button>
                            <ul class="dropdown-menu" style="">
                                <li><a class="dropdown-item" href="/sites">Zona A</a></li>
                                <li><a class="dropdown-item" href="/siteszonab">Zona B</a></li>
                            </ul>
                        </div>
                        
                        <!--DROPDOWN FIN-->
                        @if (session()->get('sesion')->rol=="administrador")
                        <div class="col-auto">
                            <a href="\crear" class="btn btn-primary">
                                <i class="fa-sharp fa-solid fa-plus"></i>
                                <span>Agregar</span>
                            </a>
                        </div>
                        @endif
                </div>
                </div>
                
            <div class="card card-outline  border-top-pk   shadow">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-condensed" style="width: 100%">
                                <thead>
                                    <!--<thead class="text-center">-->
                                    <tr>
                                        <th>Zona</th>
                                        <th>N° espacio</th>
                                        <th>Ación</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach ($datosB as $site)
                                        <tr>
                                            <td>{{ $site->zona }}</td>
                                            <td>{{ $site->sitio }}</td>
                                            <td>
                                                <div class="imgAction">
                                                    <button type="submit" class="bicon icon--blue" data-bs-toggle="modal"
                                                        data-bs-target="#modal-update-{{ $site->id }}">
                                                        <i class="fa-solid fa-pen-to-square icon--white"></i>
                                                    </button>
                                                    
                                                    <button type="submit" class="bicon icon--red" data-bs-toggle="modal"
                                                        data-bs-target="#modal-delete-{{ $site->id }}">
                                                        <i class="fa-solid fa-trash-can icon--white"></i>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                        @include('ConfiguracionParqueo.updateSite')
                                        @include('ConfiguracionParqueo.deleteSite')
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
