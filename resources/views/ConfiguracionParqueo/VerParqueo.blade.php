<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ConfiguracionParqueo/verParqueo.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body>

    @extends('welcome')
    @section('content')
        <div class="container py-3 grl-site">
            <div class="row">
                <div class="col-lg-12">
                    <div container class="d-flex justify-content-between">
                        <div class="container pb-3">
                            <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                            <span class="h3 ">Ver Sitios ZONA A</span>
                        </div>
                        <!--DROPDOWN INICIO-->
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                    Zonas
                            </button>
                            <ul class="dropdown-menu" style="">
                                <li><a class="dropdown-item" href="{{ route('verparqueo') }}">Zona A</a></li>
                                <li><a class="dropdown-item" href="{{ route('verparqueozonab') }}">Zona B</a></li>
                            </ul>
                        </div>
                        <!--DROPDOWN FIN-->
                    </div>
                   


                    <!--CARD-->

                    <div class="card card-outline  border-top-pk   shadow">
                        <div class="card-header">
                            <h5>Parqueo</h5>
                        </div>
                        <div class="container ">
                            <div class="row mx-1 gap-3">
                                @foreach ($datosA as $dato)
                                    <div class="car">
                                        <p class="h3 text-center">{{ $dato->sitio}}</p>
                                        
                                        <div
                                            class="car-content  rounded-2  bg-primary-pk text-light d-flex align-items-center justify-content-center flex-column">
                                            <i class="fa-solid fa-square-caret-up fa-3x"></i>

                                        </div>
                                        <p class="fs-6 text-center">Libre</p>
                                    </div>
                                @endforeach

                                <div class="car">
                                    <p class="h3 text-center">#</p>
                                    <div
                                        class="car-content  rounded-2  bg-danger-pk text-light d-flex align-items-center justify-content-center flex-column">
                                        <i class="fa-solid fa-car fa-3x"></i>
                                    </div>
                                    <p class="fs-6 text-center">Ocupado</p>
                                </div>
                            </div>

                        </div>


                    </div>

                </div>


            </div>
        </div>
    @endsection

</body>

</html>
