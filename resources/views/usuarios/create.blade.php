
@extends('layaouts/layaout')

@section('titulo')
  Crear Usuario :
@endsection

@section('contenido')

<div class="container p-3">
<form method="post" action="{{url("/".$cliente_id."/usuarios")}}" enctype="multipart/form-data" >
    @csrf

    
    <div class="mb-3">
      <label for="descuento" class="form-label">Nombre Usuario: </label>
      <input type="text" class="form-control" name="nombre_usuario">
    </div>

    <div class="mb-3">
      <label for="correo" class="form-label"> Correo: </label>
      <input type="email" class="form-control" name="correo">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Password: </label>
      <input type="password" class="form-control" name="password">
    </div>

  <div class="mb-3">

    <label for="rol" class="form-label">Rol: </label>
    <select class="form-control" name="rol_id">
      
    @foreach($roles as  $rol)
    

     <option value='{{$rol->id}}'>{{$rol->nombre}}

    @endforeach
   </select>
  </div>

  <div class="mb-3">

    <label for="foto" class="form-label">Foto: </label>
    <input type="file" class="form-control" name="foto">
  </div>

  <button type="submit" class="btn btn-primary">Agregar</button>


</form>

</div>

@endsection