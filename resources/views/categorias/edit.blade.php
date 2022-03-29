
@extends('layaouts/layaout')

@section('titulo')
  Editar Categoria:
@endsection

@section('contenido')

<form method="post" action="{{url("categorias/".$categoria->id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="Nombre">Nombre:</label>
        <input type="text"  name="nombre" class="form-control" value="{{$categoria->nombre}}">
      </div>

  <div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" class="form-control"  value="{{$categoria->descripcion}}">
  </div>


  <button type="submit" class="btn btn-primary">Editar</button>


</form>



@endsection