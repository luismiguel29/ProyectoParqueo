<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/listSite.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container">
        <div class="title">
            <img src="/img/logoP.png" alt="minilogo">
            <div>Lista de sitios</div>
        </div>
        
        <div class="row">
            <div class="col-lg-3">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed" style="width: 100%">
                        <thead>
                        <!--<thead class="text-center">-->
                            <tr>
                                <th>N°</th>
                                <th>N° espacio</th>
                                <th>Ación</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            @foreach($listSites as $site)
                            <tr>
                                <td>{{$site->id}}</td>
                                <td>{{$site->numero_espacio}}</td>
                                <td>
                                    <div class="imgAction">
                                        <img src="/img/imgEdit.png" alt="">
                                        <img src="/img/imgDelete.png" alt="">
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>