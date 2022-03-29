
@extends('layaouts/layaout')

@section('titulo')
  Agregar Productos:
@endsection

@section('contenido')

<form method="post" action="{{route('productos.store')}}" enctype="multipart/form-data" >
    @csrf

    <div class="form-group">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" class="form-control" >
    </div>

    <div class="form-group">
      <label for="descripcion">Descripcion:</label>
      <input type="text" name="descripcion" class="form-control" >
    </div>

    <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="text"  name="precio" class="form-control" >
      </div>

  <div class="form-group">
    <label for="stock">Stock:</label>
    <input type="text" name="stock" class="form-control" >
  </div>
  
  <div class="form-group">
    <label for="categoria">Selecionar Categoria:</label>
    <select class="form-control" name="categoria_id">

  @foreach ($categorias as $categoria)
      <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>
  @endforeach
    
    </select>
  </div>


  <button type="submit" class="btn btn-primary">Agregar</button>


</form>



@endsection