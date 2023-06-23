
<div class="modal fade" id="modal-upTarifa-{{$horario->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('enviarSolicitud.edit', $horario->id)}}" method="POST">
            @csrf
            @method('GET')
            
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar tarifa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre de la tarifa</label>
                        <input type="text" class="form-control" name="nombre" value="{{$horario->nombre}}">
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" class="form-control" name="precio" value="{{$horario->precio}}">
                        <!--@error('precio')  {{$errors->has('precio')?'is-invalid':''}}
                            <div class="invalid-feedback">
                                <ul style="list-style: none; padding: 0;">
                                    <p>{{$message}}</p>
                                </ul>
                            </div>
                        @enderror-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>