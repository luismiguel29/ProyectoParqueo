@extends('layout.welcome')
@section ('Contenido')

<div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="text mb-0"><i class="fas fa-user"></i> Gestión de Usuario Administrador</h4>
      <a href="{{ route('Cliente.ClienteForm') }}" class="btn btn-primary btn-md" type="button"><i class="fas fa-plus"></i> Agregar</a>

  </div>
</div>