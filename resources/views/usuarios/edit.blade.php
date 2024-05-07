
@extends('layaouts/layaout')

@section('titulo')
  Editar Usuario:
@endsection

@section('contenido')
<div class="container p-3">
<form method="post" action="{{url("/".$cliente_id.'/usuarios'."/".$usuario_id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="mb-3">
      <label for="descuento">Nombre Usuario: </label>
      <input type="text" class="form-control" name="nombre_usuario" value="{{$usuario->nombre_usuario}}">
    </div>

    <div class="mb-3">
      <label for="correo">Correo: </label>
      <input type="email" class="form-control" name="correo" value="{{$usuario->correo}}">
    </div>

    <div class="mb-3">
      <label for="password">Password: </label>
      <input type="password" class="form-control" name="password" value="{{$usuario->password}}">
    </div>

  <div class="mb-3">

    <label for="rol">Rol: </label>
    <select class="form-control" name="rol_id">
      
    @foreach($roles as  $rol)
    
      @if($usuario->rol_id ==$rol->id)
     <option value='{{$rol->id}}' selected>{{$rol->nombre}}

      @else
      <option value='{{$rol->id}}'>{{$rol->nombre}}

        @endif
    @endforeach
   

  </select>
</div>

<div class="mb-3">

  <label for="foto" class="form-label">Foto: </label>
  <input type="file" class="form-control" name="foto">
</div>

  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>
</div>
@endsection