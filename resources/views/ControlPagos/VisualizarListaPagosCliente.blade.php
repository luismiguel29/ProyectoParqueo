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
                                            <label class="form-label">Titular</label>
                                            
                                            <input class="form-control" type="text"    wire:model="buscar"
                                                placeholder="Ingrese titular a buscar">
                                        </div>
                                        
                                        <div class="col-12 col-md-2">
                                            <button type="button" class="btn btn-primary ">Buscar titular</button>
                                        </div>
                                        @endif
                                        <!--<div class="col-12 col-md-4">
                                            <label class="form-label">Estado</label>
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>(Todos)</option>
                                                <option value="1">Pendiente</option>
                                                <option value="2">Pagado</option>
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-2 pt-2 pt-md-0">
                                            <button type="button" class="btn btn-primary ">Buscar estado</button>
                                        </div>-->
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
                                                    <th scope="col">Período</th>
                                                    <th scope="col">Monto</th>
                                                    <th scope="col">Estado</th>
                                                    <th scope="col">Acción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (count($pagos) < 1)
                                                    <tr>
                                                        <td colspan="6">No hay registross??</td>
                                                    </tr>
                                                @else
                                                    @foreach ($pagos as $pago)
                                                        <tr>
                                                            <!--<th scope="row">Pepito</th>-->
                                                            <td>{{ $pago->nombre}}</td>
                                                            <td>{{ $pago->sitio }}</td>
                                                            <td>{{ $pago->mesLiteral}}</td>
                                                            <td>{{ $pago->monto}}<spam class="fw-bold"> BOB</spam></td>
                                                            @if ($pago->estado == 0)
                                                                <td>Debe</td>
                                                            @else
                                                                <td>Pagado</td>
                                                            @endif
                                                            <td>
                                                                <div class="d-inline-block">
                                                                    <button type="submit" class="btn btn-danger-dg btn-sm">Pagar</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
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
