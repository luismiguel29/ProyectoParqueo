<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/listSite.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
</head>
<body>
    <div class="container">
        <div class="title">
            <img src="/img/logoP.png" alt="minilogo">
            <span>Lista de sitios</span>
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
                                        <div class="bicon icon--blue">
                                            <i class="fa-solid fa-pen-to-square icon--white"></i>
                                        </div>
                                        
                                        <form action="{{route('sites.destroy', $site->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bicon icon--red">
                                                <i class="fa-solid fa-trash-can icon--white"></i>
                                            </button>
                                        </form>
                                        
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