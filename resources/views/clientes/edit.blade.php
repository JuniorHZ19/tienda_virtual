
@extends('layaouts/layaout')

@section('titulo')
  Editar Cliente:
@endsection

@section('contenido')

<form method="post" action="{{url("clientes/".$cliente->id)}}" enctype="multipart/form-data" >
  

<form method="post" action="{{route("clientes.update",["id"=>$cliente->id])}}" enctype="multipart/form-data" >


    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="documento">Documento:</label>
      <input type="text"  name="documento" class="form-control" value='{{$cliente->documento}}'>
    </div>

<div class="form-group">
  <label for="nombres">Nombres:</label>
  <input type="text" name="nombres" class="form-control" value='{{$cliente->nombres}}' >
</div>

<div class="form-group">
  <label for="apellidos">Apellidos:</label>
  <input type="text" name="apellidos" class="form-control" value='{{$cliente->apellidos}}'  >
</div>
<div class="form-group">
  <label for="direccion">Direccion:</label>
  <input type="text" name="direccion" class="form-control" value='{{$cliente->direccion}}'   >
</div>
<div class="form-group">
  <label for="fecha_nacimiento">Fecha nacimiento:	:</label>
  <input type="date" name="fecha_nacimiento" class="form-control" value='{{$cliente->fecha_nacimiento}}'  >
</div>


  <button type="submit" class="btn btn-primary">Editar</button>


</form>



@endsection