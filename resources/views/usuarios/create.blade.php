
@extends('layaouts/layaout')

@section('titulo')
  Crear Venta :
@endsection

@section('contenido')

<form method="post" action="{{url("/".$cliente_id."/usuarios")}}" enctype="multipart/form-data" >
    @csrf

    
    <div class="form-group">
      <label for="descuento">Nombre Usuario: </label>
      <input type="text" class="form-control" name="nombre_usuario">
    </div>

    <div class="form-group">
      <label for="correo">Correo: </label>
      <input type="email" class="form-control" name="correo">
    </div>

    <div class="form-group">
      <label for="password">Password: </label>
      <input type="text" class="form-control" name="password">
    </div>

  <div class="form-group">

    <label for="rol">Rol: </label>
    <select class="form-control" name="rol_id">
      
    @foreach($roles as  $rol)
    

     <option value='{{$rol->id}}'>{{$rol->nombre}}

    @endforeach
   

  </select>


  <button type="submit" class="btn btn-primary">Agregar</button>


</form>



@endsection