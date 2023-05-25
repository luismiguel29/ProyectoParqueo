<div class="modal fade" id="modal-update-{{ $dato->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('verparqueo.store') }}" method="POST">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Solicitar parqueo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control " name="sitio" disabled value="{{ $dato->sitio }}">
                    <div class="mb-3">
                        <label for="nDescripcion" class="form-label">Descripción</label>

                        <textarea name="Descripcion" id="" cols="30" rows="5" class="form-control" value="{{ $dato->descripcion }}"> </textarea>
                    </div>
                   

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Enviar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancelar</button>

                </div>
            </div>
        </form>
    </div>
</div>
