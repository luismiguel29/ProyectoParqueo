@extends('welcome')
@section('content')

<!DOCTYPE html>

<head>

    

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Ajax Autocomplete Dynamic Search with select2</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

</head>

<body >
    <div class="row">
        <div class="col col-sm-6">
            <select class="livesearch form-control p-3" name="livesearch"></select>
        </div>
    </div>
</body>

<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Select movie',
        ajax: {
            url: '/buscarplaca',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.placa,
                            id: item.id
                        }
                    })
                };
            },
            cache: true
        }
    });
</script>
</html>


    
@endsection