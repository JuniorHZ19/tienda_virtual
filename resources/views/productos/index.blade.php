@extends('layaouts/layaout')

@section('titulo')
  Productos:
@endsection

@section('contenido')

<a href="{{route("productos.create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Precio .S/</th>
      <th scope="col">Stock</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Categoria</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($productos as $producto)
    

    <tr>
      <th scope="row">{{$producto->id}}</th>
      <td>{{$producto->nombre}}</td>
      <td>{{$producto->precio}}</td>
      <td>{{$producto->stock}}</td>
      <td>{{$producto->descripcion}}</td>
      <td>{{$producto->categoria->nombre}}</td>
      <td> <a href="{{url("productos/".$producto->id."/edit")}}" class="btn btn-success">Editar</a></td>
      <td> <a href="{{url("/".$producto->id."/imagenes_producto")}}" class="btn btn-success">Imagenes</a></td>
      <td> <a href="{{url("/".$producto->id."/caracteristicas_producto")}}" class="btn btn-info">Caracteristicas</a></td>

      @if(Session::get('user')->rol->nombre=="administrador")
      <td><form method="post" action="{{url("productos/".$producto->id)}}">
          @method("DELETE")
          @csrf
          <button type="submit" class="btn btn-danger">Eliminar </button>
      </form></td>
      @endif

    </tr>

    @endforeach
  </tbody>
</table>

@endsection