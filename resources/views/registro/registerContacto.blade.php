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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h4 class="text mb-4"><i class="fas fa-address-book"></i> Datos de Contacto</h4>

                <div class="form-container">
                    <!-- Cambia la acción del formulario para apuntar a la ruta de actualización y especifica el método PUT -->
                    <form id="contactForm" action="{{ route('contacto.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="ubicacion" class="col-sm-4 col-form-label text-end"><i class="fas fa-map-marker-alt"></i> Ubicación</label>
                            <div class="col-sm-8">
                                <!-- Muestra la ubicación actual en el valor del campo -->
                                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ $contacto->ubicacion }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="celular" class="col-sm-4 col-form-label text-end"><i class="fab fa-whatsapp"></i> WhatsApp</label>
                            <div class="col-sm-8">
                                <!-- Muestra el celular actual en el valor del campo -->
                                <input type="text" class="form-control" id="celular" name="celular" value="{{ $contacto->celular }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="telefono" class="col-sm-4 col-form-label text-end"><i class="fas fa-phone"></i> Teléfono</label>
                            <div class="col-sm-8">
                                <!-- Muestra el teléfono actual en el valor del campo -->
                                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $contacto->telefono }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="correo" class="col-sm-4 col-form-label text-end"><i class="fas fa-envelope"></i> Correo Electrónico</label>
                            <div class="col-sm-8">
                                <!-- Muestra el correo actual en el valor del campo -->
                                <input type="email" class="form-control" id="correo" name="correo" value="{{ $contacto->correo }}">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Guardar</button>
                        </div>
                        <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmModalLabel">Confirmar Acción</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Estás seguro que quieres modificar los contactos?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" id="confirmButton" class="btn btn-primary">Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('confirmButton').addEventListener('click', function () {
            document.getElementById('contactForm').submit();
        });
    </script>
</body>


</html>
@endsection
