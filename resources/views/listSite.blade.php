<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/listSite.css') }}">
</head>

@extends('welcome')
@section('content')
    <section>
        <div class="container">
            <div class="title">
                <div class="bicon icon--dark">
                    <i class="fa-solid fa-p icon--white"></i>
                </div>
                <span>Lista de sitios</span>
            </div>
            
            <div class="row">
                <div class="col-lg-3">
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
                                        <td>{{$site->numero_espacio}}</td>
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
                                    @include('updateSite')
                                    @include('deleteSite')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</html>