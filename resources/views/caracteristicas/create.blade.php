
@extends('layaouts/layaout')

@section('titulo')
  Agregar Caractersitica :
@endsection

@section('contenido')

<form method="post" action="{{url("/caracteristicas")}}" enctype="multipart/form-data" >
    @csrf

      <div class="mb-3">
        <label for="nombre">Nombre: </label>
        <input type="text" class="form-control" name="nombre">
      </div>

      <div class="mb-3">
        <label for="descripcion">Descripcion: </label>
        <input type="text" class="form-control" name="descripcion">
      </div>
 

  <button type="submit" class="btn btn-primary">Agregar</button>


</form>



@endsection