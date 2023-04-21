<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/luiscss/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <div class="col-lg-6">
                <div class="containera pb-3">
                    <i class="fa-solid fa-clock fa-2x pe-1"></i>
                    <span class="h3 ">Creación de horarios</span>
                </div>

                <form action="" method="post" >
                    @csrf
                    <div class="card card-outline  border-top-pk   shadow">
                        <div class="row overflow-hidden">
                            <div class="col p-3">
                                <label class="p-2" for="">Hora de inicio</label>
                                <input class="form-control" type="time" name="h_inicio">
                            </div>
                    
                            <div class="col p-3">
                                <label class="p-2" for="">Hora de cierre</label>
                                <input class="form-control" type="time" name="h_cierre">
                            </div>
                            <div class="col p-3">
                                <label class="p-2" for="">Día</label>
                                <select class="form-control" name="" id="" name="dia">
                                    <option selected>Lunes</option>
                                    <option value="">Martes</option>
                                    <option value="">Miercoles</option>
                                    <option value="">Jueves</option>
                                    <option value="">Viernes</option>
                                    <option value="">Sabado</option>
                                    <option value="">Domingo</option>
                                </select>
                            </div>
                    
                        </div>
                        <div class="btn-group">
                            <div class="col d-grid p-3">
                                <button type="submit" class="btn" style="background: #0009B5">Guardar</button>
                            </div>
                            <div class="col d-grid p-3">
                                <button class="btn btn-danger" style="background: #FF3346">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

        </div>
    </div>
</body>

</html>
