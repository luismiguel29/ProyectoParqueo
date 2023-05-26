<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/ConfiguracionParqueo/crear.css') }}">

    <title>Document</title>
</head>

<body>
    @extends('welcome')
    @section('content')
        <div class="container py-3">
            <div class="row">
                <div class="col-lg-12 border-grl">
                    <div class="container pb-3">
                        <i class="fa-solid fa-money-check-dollar fa-2x pe-1"></i>
                        <span class="h3 ">Control de pagos</span>
                    </div>
                    <div class="card card-outline border-top-pk   shadow">
                        <div class="card-body">
                            <section>
                                <div class="container">
                                    <div class="row align-items-end">
                                        @if ( session()->get('sesion')->rol == 'secretaria')
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Tarifa</label>

                                            <input class="form-control" type="text"    wire:model="buscar"
                                                placeholder="Ingrese tarifa a buscar">
                                        </div>
                                        
                                        <div class="col-12 col-md-2">
                                            <button type="button" class="btn btn-primary ">Buscar tarifa</button>
                                        </div>
                                        @endif
                                        <div class="col-12 col-md-4">
                                            <label class="form-label">Estado</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>(Todos)</option>
                                                <option value="1">Pendiente</option>
                                                <option value="2">Pagado</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-2 pt-2 pt-md-0">
                                            <button type="button" class="btn btn-primary ">Buscar estado</button>
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="container">
                                    <div class="row pt-5 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Titular</th>
                                                    <th scope="col">Sitio</th>
                                                    <th scope="col">Fecha inicio</th>
                                                    <th scope="col">Fecha fin</th>
                                                    <th scope="col">Monto</th>
                                                    
                                                    <th scope="col">Estado</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($horarios as $horario)
                                                    <tr>
                                                        <!--<th scope="row">Pepito</th>-->
                                                        <td>{{ $horario->nombre}}</td>
                                                        <td>{{ $horario->sitio }}</td>
                                                        <td>{{ $horario->fechaasig }}</td>
                                                        <td>{{ $horario->fechaasig }}</td>
                                                        <td>60 <spam class="fw-bold">BOB</spam>
                                                        </td>
                                                        <td>
                                                            
                                                            <select class="form-select">
                                                               
                                                                <option selected>Pendiente</option>
                                                                <option value="1">Pagado</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    @endsection
</body>

</html>
