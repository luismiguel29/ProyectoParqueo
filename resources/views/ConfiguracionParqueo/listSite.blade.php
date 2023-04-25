<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/ConfiguracionParqueo/listSite.css') }}">
</head>

@extends('welcome')
@section('content')
    <section>
        <div class="container parkingSite">
            <div class="row">
                <div class="col pb-3">
                    <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                    <span class="h3">Lista de sitios</span>
                </div>
                
                <!--DROPDOWN INICIO-->
                <div class="col text-end dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                            Zonas
                    </button>
                    <ul class="dropdown-menu" style="">
                        <li><a class="dropdown-item" href="#">Zona A</a></li>
                        <li><a class="dropdown-item" href="#">Zona B</a></li>
                    </ul>
                </div>
                <!--DROPDOWN FIN-->
                
                <div class="col text-end">
                    <a href="\crear" class="btn btn-primary">
                        <i class="fa-sharp fa-solid fa-plus"></i>
                        <span>Agregar</span>
                    </a>
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
                                        <th>N°</th>
                                        <th>N° espacio</th>
                                        <th>Ación</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    @foreach($listSites as $site)
                                        <tr>
                                            <td>{{$site->id}}</td>
                                            <td>{{$site->sitio}}</td>
                                            <td>
                                                <div class="imgAction">
                                                    <button type="submit" class="bicon icon--blue" data-bs-toggle="modal" data-bs-target="#modal-update-{{$site->id}}">
                                                        <i class="fa-solid fa-pen-to-square icon--white"></i>
                                                    </button>
                                                    
                                                    <button type="submit" class="bicon icon--red" data-bs-toggle="modal" data-bs-target="#modal-delete-{{$site->id}}">
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
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</html>