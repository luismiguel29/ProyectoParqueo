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
    <link rel="stylesheet" href="{{ asset('css/luiscss/horario.css') }}">
</head>

<body>
    <div class="container py-3">
        <div class="row">
            <div class="row">
                <div class="col p-3" >
                    <i class="fa-solid fa-clock fa-2x pe-1"></i>
                    <span class="h3 ">Gestión de horarios</span>
                </div>
                <div class="col p-3 text-end" >
                    <form action="{{ route('') }}">
                        <button class="btn btn-primary btn-lg">Agregar</button>
                    </form>
                </div>

                <div class="card card-outline  border-top-pk   shadow">
                    <table class="table table-bordered table-hover mt-3">
                        <thead class="p-3">
                            <tr>
                                <th>#</th>
                                <th>Hora inicio</th>
                                <th>Hora cierre</th>
                                <th>Día</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>hola</td>
                                <td>hola</td>
                                <td scope='row'>hola</td>
                                <td scope='row' class="text-center">
                                    <i class="fa-solid fa-pen-to-square fa-xl" type='button' style="color: #0009B5"></i>
                                    <i class="fa-solid fa-trash-can fa-xl" type='button' style="color: #FF3346"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</body>

</html>
