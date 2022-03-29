@extends('layaouts/layaout')

@section('titulo')
  Roles:
@endsection

@section('contenido')

<a href="{{route("roles.create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach ($roles as $rol)
    

    <tr>
      <th scope="row">{{$rol->id}}</th>
      <td>{{$rol->nombre}}</td>
      <td>{{$rol->descripcion}}</td>
     
      <td> <a href="{{url("roles/".$rol->id."/edit")}}" class="btn btn-success">Editar</a></td>
      <td><form method="post" action="{{url("roles/".$rol->id)}}">
          @method("DELETE")
          @csrf
          <button type="submit" class="btn btn-danger">Eliminar </button>
      </form></td>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection