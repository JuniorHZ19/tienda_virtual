
@extends('layaouts/layaout')

@section('titulo')
  Editar Caracteristica:
@endsection

@section('contenido')

<form method="post" action="{{url("caracteristicas"."/".$caracteristica->id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="mb-3">
      <label for="nombre">Nombre: </label>
      <input type="txt" class="form-control" name="nombre" value='{{$caracteristica->nombre}}'>
    </div>

    <div class="mb-3">
      <label for="descripcion">Descripcion: </label>
      <input type="txt" class="form-control" name="descripcion" value='{{$caracteristica->descripcion}}'>
    </div>
 

  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>

@endsection