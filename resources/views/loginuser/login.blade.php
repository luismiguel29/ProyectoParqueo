@extends('plantilla')
@section('content')

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/luiscss/login.css') }}">
    
    

</head>

<body>

    <div class="container-fluid">

        <div class="row">

            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="logo">
                    <img src="/img/logoblack.png" class="img-fluid" alt="">
                </div>
                <div class="card shadow rounded-3 my-5 border-top-pk">

                    <div class="card-body p-4 p-sm-5 shadow">
                        <div class="cardtitle input-group">
                            <i class="fa-solid fa-user fa-2xl" style="color: #000000;"></i>
                            <span class="card-title text-center fs-5 h5">Por favor inicie sesión</span>
                        </div>
                        <form action="{{ route('iniciarsesion') }}" method="post" >
                            @csrf
                            @if (session('alerta'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ session('alerta') }}</strong>                                    
                                </div>
                            @endif
                            <div class="form-outline mb-4">
                                <input type="text" id="" name="usuario" class="form-control form-control-lg {{$errors->has('usuario')?'is-invalid':''}}"
                                    placeholder="Usuario" />
                                @error('usuario')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="row mb-4">
                                <div class="form-outline input-group">
                                    <input type="password" id="txtPassword" name="password"
                                        class="form-control form-control-lg {{$errors->has('password')?'is-invalid':''}}" placeholder="Contraseña" />
                                        
                                    <span class="input-group-btn">
                                        <button id="show_password" class="btn btn-primary" type="button"
                                            onclick="mostrarPassword()">
                                            <span class="fa fa-eye-slash icon"></span> </button>
                                    </span>                                
                                </div>
                                @error('password')
                                    <div class="" style="color: #d9534f; font-size: 12px">
                                        {{ $message }}
                                    </div>
                                @enderror
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

    
@endsection