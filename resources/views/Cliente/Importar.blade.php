
 <!-- Modal -->
 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="deleteModalLabel">Eliminar Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('Cliente.eliminar')}}" method="post">
          <div class="modal-body">
            @csrf
            @method('delete')
            <input id="id" name="id" hidden>
            ¿Esta seguro de eliminar este cliente?
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary-pk" data-bs-dismiss="modal">Cancelar</button>
            <button  class="btn btn-danger-dg">Eliminar</button>
          </div>
        </form>
      </div>
    </div>
  </div>