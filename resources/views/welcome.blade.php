<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Parking UMSS</title>

    <!-- Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    @yield('head')
</head>

<body>

    <header class="navbar navbar-sky sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">
            <img src="/img/logo.png" alt="">
        </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
           
        </button>
        <li class="nav-item d-none d-md-block" style=" list-style:none; padding-right:30px; ">
            <a class="nav-link " aria-current="page"
                href="{{ route('cerrarsesion') }}">
                <i class="fa-solid fa-power-off fa-lg"  style="color:#fff;"></i>
            </a>
        </li>

        
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse  scrollbox ">
                <div class="position-sticky pt-3 ">
                    <ul class="nav flex-column  menu">
                        <li class="nav-item">
                            <label class="nav-link active" aria-current="page">
                                <i class="fa-solid fa-circle-user fa-2xl pe-2" style="color: #3ad501;"></i>
                                Usuario : {{ session()->get('sesion')->usuario }}
                            </label>
                        </li>
                        <hr style="background: white; height:2px;">
                        @if (session()->get('sesion')->rol == 'cliente' || session()->get('sesion')->rol == 'administrador')
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('verparqueo') }}">
                                    <i class="fa-solid fa-house pe-2"></i>
                                    Inicio
                                </a>
                            </li>
                        @endif 
                        @if (session()->get('sesion')->rol == 'administrador')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('vistaRegister') }}">
                                    <span data-feather="file"></span>
                                    <i class="fa-solid fa-users pe-2"></i>
                                    Usuarios
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' )
                            <li class="nav-item">
                                <a class="nav-link" href="/sites">
                                    <span data-feather="users"></span>
                                    <i class="fa-solid fa-square-parking pe-2"></i>
                                    Parqueos
                                </a>
                            </li>
                        @endif
                                               
                        @if (session()->get('sesion')->rol == 'administrador' || session()->get('sesion')->rol == 'secretaria')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Cliente.listacliente') }}">
                                    <span data-feather="shopping-cart"></span>
                                    <i class="fa-solid fa-user pe-2"></i>
                                    Clientes
                                </a>
                            </li>
                        @endif    
                        @if (session()->get('sesion')->rol == 'cliente')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('mostrarCuenta') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    <i class="fa-solid fa-user pe-2"></i>
                                    Cuenta
                                </a>
                            </li>
                        @endif   
                        @if (session()->get('sesion')->rol == 'administrador' )
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('asignar') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    <i class="fas fa-car pe-2"></i>
                                    Asignar sitio
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sitio'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('listainvitado') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    <i class="fa-solid fa-handshake pe-2"></i>
                                    Compartir sitio
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('solicitud') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    <i class="fas fa-file-alt pe-2"></i>
                                    Solicitudes
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' || session()->get('sesion')->rol == 'cliente')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('listavehiculo') }}">
                                <span data-feather="users"></span>
                                <i class="fa-solid fa-car-side pe-2"></i>
                                Vehiculos
                            </a>
                        </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' ||
                                session()->get('sesion')->rol == 'guardia')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('listaregistro') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    <i class="fa-sharp fa-solid fa-right-left pe-2"></i>
                                    Entradas/Salidas
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' || session()->get('sesion')->rol == 'secretaria')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Mensaje.listamensaje') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    <i class="fa-solid fa-envelope pe-2"></i>
                                    Mensajes
                                    <i></i>

                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' || session()->get('sesion')->rol == 'secretaria')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('visualizarReclamo') }}">
                                    <span data-feather="users"></span>
                                    <i class="fas fa-book pe-2"></i>
                                    Ver Reclamos
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'cliente')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('reclamo') }}">
                                    <span data-feather="users"></span>
                                    <i class="fas fa-bullhorn pe-2 "></i>
                                    Reclamos
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' || session()->get('sesion')->rol == 'secretaria')
                            <li class="nav-item">
                                <a class="nav-link" href='/enviarSolicitud'>
                                    <span data-feather="users"></span>
                                    <i class="fa-solid fa-dollar pe-2"></i>
                                    Tarifas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href='/visualizarPagos'>
                                    <span data-feather="users"></span>
                                    <i class="fa-solid fa-money-check-dollar pe-2"></i>
                                    Control de pagos
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'cliente')
                            <li class="nav-item">
                                <a class="nav-link" href='/visualizarPagosCliente'>
                                    <span data-feather="users"></span>
                                    <i class="fa-solid fa-money-check-dollar pe-2"></i>
                                    Control de pagos
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' || session()->get('sesion')->rol == 'secretaria')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('verConfiguracion') }}">
                                    <span data-feather="users"></span>
                                    <i class="fa-solid fa-gear pe-2"></i>
                                    Configuraciones
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' || session()->get('sesion')->rol == 'secretaria')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Reportes.reportesDeIngreso') }}">
                                    <span data-feather="users"></span>
                                    <i class="fa-solid fa-file-pdf fa-lg pe-2"></i>
                                    Reportes
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('listahistorial') }}">
                                    <span data-feather="users"></span>
                                    <i class="fa-solid fa-calendar-days pe-2"></i>
                                    Historial de Reportes
                                </a>
                            </li>
                        @endif
                        @if (session()->get('sesion')->rol == 'administrador' )
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contacto.edit') }}">
                                    <span data-feather="users"></span>
                                    <i class="fas fa-address-book  pe-2"></i>
                                    Datos del Parqueo
                                </a>
                            </li>
                        @endif                        
                        @if (session()->get('sesion')->rol == 'cliente')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('Vistacontactos') }}">
                                    <span data-feather="bar-chart-2"></span>
                                    <i class="fas fa-info-circle pe-2"></i>
                                    informacion
                                </a>
                            </li>
                        @endif     
                        <hr style="background: white; height:2px;">
                        <li class="nav-item out-session d-md-none">
                            <a class="nav-link " aria-current="page"
                                href="{{ route('cerrarsesion') }}">
                                <i class="fa-solid fa-power-off pe-2 "> </i> Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class=" py-3 mb-3 border-bottom">
                    <!--BODY INIT-->

                    @yield('content')

                    <!--BODY END-->
                </div>

            </main>

        </div>
    </div>
    <script type="module" src="./js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>
