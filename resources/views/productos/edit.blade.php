
@extends('layaouts/layaout')

@section('titulo')
  Editar Producto:
@endsection

@section('contenido')

<form method="post" action="{{url("productos/".$producto->id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" class="form-control" value="{{$producto->nombre}}" >
    </div>

    <div class="form-group">
      <label for="descripcion">Descripcion:</label>
      <input type="text" name="descripcion" class="form-control"  value="{{$producto->descripcion}}" >
    </div>

    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text"  name="precio" class="form-control" value="{{$producto->precio}}"  >
      </div>

  <div class="form-group">
    <label for="stock">Stock:</label>
    <input type="text" name="stock" class="form-control" value="{{$producto->stock}}"  >
  </div>


  
  <div class="form-group">
    <label for="categoria">Selecionar Categoria:</label>
    <select class="form-control" name="categoria_id">

  @foreach ($categorias as $categoria)
      @if($categoria->id == $producto->categoria->id)
      <option value="{{ $categoria->id }}" selected>{{$categoria->nombre}} </option>
      @else
      <option value="{{ $categoria->id }}">{{$categoria->nombre}} </option>
      @endif
  @endforeach


    </select>
  </div>
    <button type="submit" class="btn btn-primary">Editar</button>

</form>


@endsection