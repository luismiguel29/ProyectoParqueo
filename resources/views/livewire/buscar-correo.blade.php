
<form action="{{route('MensajesGlobales.send')}}" method="post">
    @csrf
    <input id="mensajeCorreo" name="id" hidden>
    <select  name="user" class="js-example-basic-single">
        
        @foreach ($users as $user)
            <option value="{{ $user['id'] }}">{{ $user['nombre'] }}</option>
        @endforeach
    </select>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary-pk" data-bs-dismiss="modal">Cancelar</button>
        <button  class="btn btn-danger-dg">Enviar</button>
    </div>
</form>
