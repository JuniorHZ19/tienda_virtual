@extends('layaouts/layaout')

@section('titulo')
  Imagenes Producto:
@endsection

@section('contenido')

<a href="{{url("/".$id_producto."/imagenes_producto/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Imagen:</th>

    </tr>
  </thead>
  <tbody>
    @foreach ($imagenes_producto as $imagen_producto)
    

    <tr>

      <td> {{$imagen_producto->id}}</td>
    
      <td scope="row"><img src="{{asset($imagen_producto->imagen)}}"  width="400" height="300"></td>

      <td> <a href="{{url("/".$id_producto."/"."imagenes_producto/".$imagen_producto->id."/edit")}}" class="btn btn-success">Editar</a></td>

      <td><form method="post" action="{{url("/".$id_producto."/"."imagenes_producto/".$imagen_producto->id)}}">
          @method("DELETE")
          @csrf
          <button type="submit" class="btn btn-danger">Eliminar </button>
      </form></td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection