
@extends('layaouts/layaout')

@section('titulo')
  Agregar Imagen :
@endsection

@section('contenido')

<form method="post" action="{{url("/".$id_producto."/imagenes_producto")}}" enctype="multipart/form-data" >
    @csrf

      <div class="form-group">
        <label for="imagen">Subir imagen: </label>
        <input type="file" class="form-control-file" name="imagen">
      </div>
 

  <button type="submit" class="btn btn-primary">Agregar</button>


</form>



@endsection