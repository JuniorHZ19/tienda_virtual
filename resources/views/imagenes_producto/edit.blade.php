
@extends('layaouts/layaout')

@section('titulo')
  Editar Producto:
@endsection

@section('contenido')

<form method="post" action="{{url("/".$id_producto.'/imagenes_producto'."/".$imagen_producto->id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

      <div class="form-group">
        <label for="imagen">Cambiar imagen: </label>
        <input type="file" class="form-control-file" name="imagen">
        
      </div>
 

  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>

@endsection