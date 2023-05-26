
<form action="{{route('MensajesGlobales.send')}}" method="post">
    @csrf
    <input id="mensajeCorreo" name="id" hidden>
    <select  name="user" class="js-example-basic-single">
        
        @foreach ($users as $user)
            <option value="{{ $user['id'] }}">{{ $user['nombre'] }}</option>
        @endforeach
    </select>
    <div class="modal-footer">
        <button  class="btn btn-primary-pk">Enviar</button>
        <button type="button" class="btn  btn-danger-dg" data-bs-dismiss="modal">Cancelar</button>
        
    </div>
</form>
