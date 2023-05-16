<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 8 Ajax Autocomplete Dynamic Search with select2</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <style>
        h2 {
            color: white;
        }
    </style>
</head>

<body class="bg-primary">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center mt-5">
                <h2>Laravel 8 AJAX Autocomplete Search with Select2</h2>
            </div>
            <div class="col-md-8 mt-5 offset-2">
                <select class="livesearch form-control p-3" name="livesearch"></select>
            </div>
        </div>
    </div>
</body>

<script type="text/javascript">
    $('.livesearch').select2({
        placeholder: 'Select movie',
        ajax: {
            url: '/ajax-autocomplete-search',
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

