@extends('layout.welcome')
@section ('Contenido')
<div>
  <a type="button" class="btn btn-primary" href="{{route('Cliente.ClienteForm')}}">agregar</a>
</div>

<div class="d-flex justify-content-around ">

    <div class="bg-white border  mb-3 overflow-auto " style="border-radius: 0px; max-height:550px ">
      <div class="table-responsive mt-3 pb-3 ps-5 pe-5 overflow-auto ">
        @if($clientes-> isNotEmpty())
          <table class="table table-bordered border-dark table-hover">
  
            <thead class="table-light" >
              <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Cedula</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Tipo de Vehiculo</th>
                <th>Placa</th>
                <th>Acciones</th>
              </tr>
            </thead>

            <tbody class="table-light">
                @foreach ($clientes as $cliente)
                <tr>
                  <td>{{$cliente->nombre}}</td>
                  <td> {{$cliente->apellido}}</td>
                  <td>{{$cliente->ci}}</td>
                  <td>{{$cliente->telefono}}</td>
                  <td>{{$cliente->correo}}</td>
                  <td>{{$cliente->tipo_vehiculo}} </td>
                  <td>{{$cliente->placa}}</td>
                      <td>
                        <div class="d-flex justify-content-evenly">
                          <a href="{{route('Cliente.verform', ['id'=>$cliente->id])}}" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>
                          <button class="btn delete-btn" data-bs-toggle="modal" data-id="{{$cliente->id}}" data-bs-target="#deleteModal"><i class="fa-solid fa-trash" ></i></button>
                        </div>
                      </td>
                </tr>
                @endforeach
    
              </tbody>
            
          </table>
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
                      <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Cancelar</button>
                      <button  class="btn btn-dark">Eliminar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
        @else
  
          <div class="alert alert-dark" role="alert">
            No existen clientes registrados!
          </div>
        @endif
      <div>
        <script>
          $(document).ready(function(){
            
              $('.delete-btn').on('click', function(){
      
                let id = $(this).attr('data-id');
                    $('#id').val(id);
              
              });
          });
        </script>
      </div>
  </div>
@endsection