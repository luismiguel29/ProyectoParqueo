<!-- Modal -->
<div class="modal fade" id="registrarMensaje" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Mensaje</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST"
                    action="{{ isset($user) ? route('Cliente.editardato', ['id' => $user->id]) : route('MensajesGlobales.registarMen') }}"
                    style="padding: 50px 55px">
                    @csrf
                    @if (isset($user))
                        @method('put')
                    @endif
                    <div class="row mb-3">
                        <label for="inputAsunto3" class="col-sm-4 col-form-label text-end">Asunto</label>
                        <div class="col-sm-7">
                            <input name="asunto" class="form-control {{ $errors->has('asunto') ? 'is-invalid' : '' }}"
                                id="inputAsunto3" value="{{ isset($user) ? $user->nombre : old('asunto') }}">
                            @error('asunto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="inputDescripcion3" class="col-sm-4 col-form-label text-end">Descripcion</label>
                        <div class="col-sm-7">
                            <input name="descripcion"
                                class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}"
                                id="inputDescripcion3" value="{{ isset($user) ? $user->apellido : old('apellido') }}">
                            @error('descripcion')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                    <button  class="btn btn-primary">Guardar</button>
                </form>
            </div>

        </div>
    </div>
</div>

