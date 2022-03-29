
@extends('layaouts/layaout')

@section('titulo')
  Agregar Rol:
@endsection

@section('contenido')

<form method="post" action="{{route('roles.store')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text"  name="nombre" class="form-control" >
      </div>

  <div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" class="form-control" >
  </div>

  <button type="submit" class="btn btn-primary">Agregar</button>


</form>



@endsection