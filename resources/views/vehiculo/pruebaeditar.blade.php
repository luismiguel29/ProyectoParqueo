<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">
        @csrf
        <button type="submit">Enviar</button>
    </form>

    <a href="{{ route('envcorreo') }}" class="btn btn-primary">Correo</a>
    
</body>
</html>