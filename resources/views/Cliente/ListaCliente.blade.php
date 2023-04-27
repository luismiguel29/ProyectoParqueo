@extends('welcome')
@section ('content')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{asset('css/Cliente/listacliente.css')}}">
  <link rel="stylesheet" href="{{asset('css/Cliente/modalbotones.css')}}">
  <title>TIS</title>
</head>
<body>
 
  <div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="text mb-0"><i class="fas fa-user"></i> Gestión de Usuario Cliente</h4>
        <a href="{{ route('Cliente.ClienteForm') }}" class="btn btn-primary btn-md" type="button"><i class="fas fa-plus"></i> Agregar</a>
    </div>
        
          <div class="table-responsive" id="table-container">
            @if($clientes-> isNotEmpty())
            <div class="blue-line"></div>
              <table class="table">
      
                <thead >
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
    
                <tbody>
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
                              <a href="{{route('Cliente.verform', ['id'=>$cliente->id])}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                              <button class="btn delete-btn btn-danger btn-sm"  data-bs-toggle="modal" data-id="{{$cliente->id}}" data-bs-target="#deleteModal"><i class="fas fa-trash-alt"  ></i></button>
                              
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
                          <button type="button" class="btn btn-primary-pk" data-bs-dismiss="modal">Cancelar</button>
                          <button  class="btn btn-danger-dg">Eliminar</button>
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
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
            integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
            integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous">
        </script>

</body>
</html>
@endsection