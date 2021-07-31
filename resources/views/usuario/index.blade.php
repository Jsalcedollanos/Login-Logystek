@extends('adminlte::page')

@section('title', 'Usuarios || Logystek')

@section('content_header')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <h1>Usuarios Logystek</h1>
@stop

@section('content')

<!-- Boton para crear usuarios -->
<a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-modal" data-bs-whatever="@getbootstrap">Agregar Usuario</a>
<!-- fin -->

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Email</th>
      <th scope="col">Roll</th>
      <th scope="col">Fecha de creacion</th>
      <th scotpe="col">Editar</th>
      <th scotpe="col">Eliminar</th>
    </tr>
  </thead>

    
    <tbody>
    @foreach ($users as $user)
    <tr>
      <th scope="row">{{$user -> id}}</th>
      <td>{{$user -> name}}</td>
      <td>{{$user -> email}}</td>
      <td>{{$user -> rol}}</td>
      <td>{{$user -> created_at}}</td>
      <td>
      <a href="usuario/{{$user->id}}/edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-modal" data-bs-whatever="@fat">Editar</a>
     <!--  <a href="usuario/{{$user->id}}/edit" class="btn btn-primary">Editar</a> -->
      </td>

      @if($user -> rol =="user" || $user -> rol =="admin")
      <td>
          <form action="{{ url("usuario/{$user->id}") }}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
      </td>
      @else
      <td><button disabled type="submit" class="btn btn-danger">Eliminar</button></td>
      @endif
      
    @endforeach
  </tbody>
</table>


<!-- MODAL DE EDICION PARA USUARIOS -->

<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <form action="/usuario/{{$user->id}}" method="POST">
            @csrf
            @method('PUT')
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">ID:</label>
            <input type="text" readonly class="form-control" id="name" name="name" value="{{$user->id}}">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Rol:</label>
            <select name="rol" class="form-select" aria-label="Default select example">
              <option value="user" name="rol">Usuario</option>
              <option value="admin" name="rol">Administrador</option>
              <option value="super usuario" name="rol">Super Usuario</option>
            </select>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
        </form>
      </div>
     
    </div>
  </div>
</div>

<!-- FIN DE MODAL DE EDICION -->

<!-- MODAL DE GUARDAR PARA USUARIOS -->

<div class="modal fade" id="add-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Guardar Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form href="usuario/index" method="POST">
        @csrf
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" required class="form-control" id="recipient-name" name="name" value="">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Email:</label>
            <input type="email" required class="form-control" id="recipient-name" name="email" value="">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Rol:</label>
            <select  name="rol" required class="form-select" aria-label="Default select example">
              <option value="user" name="rol">Usuario</option>
              <option value="admin" name="rol">Administrador</option>
              <option value="super usuario" name="rol">Super Usuario</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Contraseña:</label>
            <input type="password" required class="form-control" id="recipient-name" name="password" value="">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Repetir Contraseña:</label>
            <input type="password" required class="form-control" id="recipient-name" name="repetirContraseña" value="">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- FIN DE MODAL DE GUARDAR -->

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
@stop