@extends('layaouts/layaout')

@section('titulo')
  Imagenes Producto:
@endsection

@section('contenido')

<a href="{{url("/caracteristicas/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre:</th>
      <th scope="col">Descripcion:</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($caracteristicas as $caracteristica)
    

    <tr>

      <td> {{$caracteristica->id}}</td>
    
      <td scope="row">{{$caracteristica->nombre}}</td>

      <td scope="row">{{$caracteristica->descripcion}}</td>

      <td> <a href="{{url("/"."caracteristicas/".$caracteristica->id."/edit")}}" class="btn btn-success">Editar</a></td>

      <td><form method="post" action="{{url("/"."caracteristicas/".$caracteristica->id)}}">
          @method("DELETE")
          @csrf
          <button type="submit" class="btn btn-danger">Eliminar </button>
      </form></td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection