<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <section>
        <table class="table" style="width: 100%">
            <thead>
                <!--<thead class="text-center">-->
                <tr>
                    <th>Zona</th>
                    <th>N° espacio</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($listSites as $site)
                    <tr>
                        <td>{{ $site->zona }}</td>
                        <td>{{ $site->sitio }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>