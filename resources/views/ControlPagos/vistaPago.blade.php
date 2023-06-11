@extends('welcome')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="{{ asset('css/luiscss/login.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
        <link rel="stylesheet" href="{{ asset('css/luiscss/boton.css') }}">
    </head>

    <body>
        <div class="container py-3">
            <div class="row">
                <div class="col">
                    <div class="containera pb-3">
                        <i class="fa-solid fa-hand-holding-dollar fa-2xl"></i>
                        <span class="h3 ">Realizar Pago</span>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('realizarPago', $pago->id) }}" method="POST">
                        @csrf
                        <div class="card card-outline  border-top-pk   shadow p-3">
                            <div  class="col-sm-6 text-center">  
                                <div class="row p-1">
                                    <h1 class="">Comprobante de pago</h1>
                                    <hr>
                                </div>                              
                                <div class="row p-1">
                                    <h4><strong>Nombre:</strong> {{ $pago->pagoTitular->nombre }} {{ $pago->pagoTitular->apellido }}</h4>
                                </div>
                                <div class="row p-1">
                                    <h4><strong>CI/NIT:</strong> {{ $pago->pagoTitular->ci }}</h4>
                                </div>
                                <div class="row p-1">
                                    <h4><strong>Sitio:</strong> {{ $pago->pagoSitio->sitio }} {{ $pago->pagoSitio->zona }}</h4>
                                </div>
                                <div class="row p-1">
                                    <div class="row">
                                        <h3><strong>Codigo QR</strong>:</h3>
                                    </div>
                                    <div class="card mx-auto" style="width: 18rem;">
                                        <img src="https://josefacchin.com/wp-content/uploads/2022/04/qr-code.png" alt="">
                                    </div>
                                </div>
                                <div class="row p-1">
                                    <h4 class=""><strong>Monto a pagar (bs):</strong></h4>
                                    <h1 class="">{{ $pago->pagoTarifa->precio }}</h1>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row row-gap-3 mt-3">
                                        <div class="col-sm-6 mx-auto d-grid">
                                            <button type="button" class="btn btn-primary-pk" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">Completar pago</button>
                                        </div>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">¡Atención!
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">Esta seguro de realizar el pago?</div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger-dg"
                                                            data-bs-dismiss="modal">Cerrar</button>
                                                        

                                                        <form action="{{ route('realizarPago', $pago->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="btn btn-primary-pk"
                                                            style="">Pagar</button>
                                                        </form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-sm-6 mx-auto d-grid">
                                            <a @if (session()->get('sesion')->rol == 'cliente')
                                                href="/visualizarPagosCliente"
                                            @else
                                                href="/visualizarPagos"
                                            @endif  type="submit" class="btn btn-danger-dg">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </body>

    </html>
@endsection
