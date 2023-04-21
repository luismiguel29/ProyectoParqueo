<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/luiscss/login.css') }}">

</head>

<body>

    <div class="container">

        <div class="row">

            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="logo">
                    <img src="/img/logoblack.png" class="img-fluid" alt="">
                </div>
                <div class="card border-0 shadow rounded-3 my-5">

                    <div class="card-body p-4 p-sm-5 border-top-pk shadow">
                        <div class="cardtitle input-group">
                            <i class="fa-solid fa-user fa-2xl" style="color: #000000;"></i>
                            <span class="card-title text-center fs-5 h5">Por favor inicie sesión</span>
                        </div>
                        <form action="{{ route('login.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @if (session('alerta'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>{{ session('alerta') }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="form-outline mb-4">
                                <input type="text" id="" name="usuario" class="form-control form-control-lg"
                                    placeholder="Usuario" />
                            </div>
                            <div class="form-outline mb-4 input-group">
                                <input type="password" id="txtPassword" name="contraseña"
                                    class="form-control form-control-lg" placeholder="Contraseña" />
                                <span class="input-group-btn">
                                    <button id="show_password" class="btn btn-primary" type="button"
                                        onclick="mostrarPassword()">
                                        <span class="fa fa-eye-slash icon"></span> </button>
                                </span>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary btn-login" type="submit">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

<script type="text/javascript">
    function mostrarPassword() {
        var cambio = document.getElementById("txtPassword");
        if (cambio.type == "password") {
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        } else {
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }
</script>

</html>
