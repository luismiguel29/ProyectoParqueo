<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link  rel="stylesheet" href="{{asset('css/verParqueo.css')}}">
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
                    <div class="container pb-3">
                        <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                        <span class="h3 ">Ver Sitios</span>
                    </div>

                    <div class="card card-outline  border-top-pk   shadow">
                        <div class="card-header">
                            <h5>Parqueo</h5>
                        </div>
                        <div class="container ">
                            <div class="row gap-3">
                                <div class="car">
                                    <p class="h3 text-center">1</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span>libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">2</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span class="fs-6">libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">3</p>
                                    <div
                                        class="car-content bg-primary text-light d-flex align-items-center justify-content-center flex-column">
                                        <i class="fa-solid fa-car-side fa-2x"></i>
                                    </div>
                                    <p class="fs-6 text-center">Ocupado</p>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">1</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span>libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">2</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span class="fs-6">libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">3</p>
                                    <div
                                        class="car-content bg-primary text-light d-flex align-items-center justify-content-center flex-column">
                                        <i class="fa-solid fa-car-side fa-2x"></i>
                                    </div>
                                    <p class="fs-6 text-center">Ocupado</p>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">1</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span>libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">2</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span class="fs-6">libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">3</p>
                                    <div
                                        class="car-content bg-primary text-light d-flex align-items-center justify-content-center flex-column">
                                        <i class="fa-solid fa-car-side fa-2x"></i>
                                    </div>
                                    <p class="fs-6 text-center">Ocupado</p>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">1</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span>libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">2</p>
                                    <div
                                        class="car-content bg-success text-light d-flex align-items-center justify-content-center flex-column">
                                        <span class="fs-6">libre</span>
                                    </div>
                                </div>
                                <div class="car">
                                    <p class="h3 text-center">3</p>
                                    <div
                                        class="car-content bg-primary text-light d-flex align-items-center justify-content-center flex-column">
                                        <i class="fa-solid fa-car-side fa-2x"></i>
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