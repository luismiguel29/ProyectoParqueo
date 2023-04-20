<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/ConfiguracionParqueo/crear.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="hold-transition sidebar-mini">

    <div class="container py-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="container pb-3">
                    <i class="fa-solid fa-car-side fa-2x pe-1"></i>
                    <span class="h3 ">Creación de sitios</span>
                </div>

                <div class="card card-outline  border-top-pk   shadow">
                    <div class="card-header">
                        <h5>Ingrese todos los campos</h5>
                    </div>
                    <!--APARTIR DE AQUI ES EL BODY-->
                    <div class="card-body" style="display: block;">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Nro espacio</label>
                                    <input type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form group">
                                    <label for="">Zona</label>
                                    <select name="" id="" class="form-control">
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Observaciones</label>
                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="row row-gap-3 pt-4">
                            <div class="col-md-6">
                                <a href="" class="btn btn-primary-pk btn-block w-100">Registrar</a>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-danger-dg btn-block w-100">
                                    Cancelar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</body>

</html>


