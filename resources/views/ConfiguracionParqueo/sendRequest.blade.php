<div class="modal fade" id="modal-update-{{ $dato->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('guardarSolicitud', $dato->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Solicitar parqueo {{$dato->sitio}}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nDescripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control {{$errors->has('descripcion')?'is-invalid':''}}" value="{{ $dato->descripcion }}"> </textarea>
                        @error('descripcion')
                            <span class= "invalid-feedback">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>
