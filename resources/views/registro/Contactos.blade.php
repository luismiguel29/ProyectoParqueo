@extends('welcome')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h4 class="text mb-4"><i class="fas fa-info-circle pe-2"></i> Información de Contacto</h4>

                <div class="form-container d-flex justify-content-between">
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <p><strong style="font-size:1.0em">Ubicación:</strong> <a style="font-size:1.0em" href="https://goo.gl/maps/WZZLcPiv5FnLR28m7" target="_blank">{{ $contacto->ubicacion }}</a></p>
                        </div>

                        <div class="contact-item">
                            <i class="fab fa-whatsapp"></i>
                            <p><strong style="font-size:1.0em">WhatsApp:</strong> <a style="font-size:1.0em" href="https://wa.me/{{ str_replace(['+', '-', '(', ')', ' '], '', $contacto->celular) }}" target="_blank">{{ $contacto->celular }}</a></p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <p><strong style="font-size:1.0em">Teléfono:</strong> <span style="font-size:1.0em">{{ $contacto->telefono }}</span></p>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <p><strong style="font-size:1.0em">Email:</strong> <a style="font-size:1.0em" href="mailto:{{ $contacto->correo }}" target="_blank">{{ $contacto->correo }}</a></p>
                        </div>
                    </div>

                    <div class="logo-container d-flex justify-content-center align-items-center mx-5">
                        <img src="{{ asset('img/logos.png') }}" alt="Logo de la Empresa">
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
@endsection
