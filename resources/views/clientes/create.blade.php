
@extends('layaouts/layaout')

@section('titulo')
  Agregar Cliente:
@endsection

@section('contenido')

<form method="post" action="{{route('clientes.store')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="documento">Documento:</label>
        <input type="text"  name="documento" class="form-control" >
      </div>

  <div class="form-group">
    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" class="form-control" >
  </div>

  <div class="form-group">
    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" class="form-control" >
  </div>
  <div class="form-group">
    <label for="direccion">Direccion:</label>
    <input type="text" name="direccion" class="form-control" >
  </div>
  <div class="form-group">
    <label for="fecha_nacimiento">Fecha nacimiento:	:</label>
    <input type="date" name="fecha_nacimiento" class="form-control" >
  </div>



  <button type="submit" class="btn btn-primary">Agregar</button>


</form>



@endsection