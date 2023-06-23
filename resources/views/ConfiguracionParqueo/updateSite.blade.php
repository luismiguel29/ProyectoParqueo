
<div class="modal fade" id="modal-update-{{$site->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{route('sites.update', $site->id)}}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Editar sitio de parqueo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nSitio" class="form-label">N° espacio</label>
                        <input type="text" class="form-control {{$errors->has('sitio')?'is-invalid':''}}" name="sitio" value="{{$site->sitio}}">
                        @error('sitio')
                            <div class="invalid-feedback">
                                <ul style="list-style: none; padding: 0;">
                                    <p>{{$message}}</p>
                                </ul>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="nDescripcion" class="form-label">Descripción</label>
                        <input type="text" class="form-control" name="nDescripcion" value="{{$site->descripcion}}">
                    </div>
                    <div class="mb-3">
                        <label for="disabledSelect" class="form-label">Zona</label>
                        <input type="text" class="form-control" disabled value="{{$site->zona}}">
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