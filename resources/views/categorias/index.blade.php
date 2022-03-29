@extends('layaouts/layaout')

@section('titulo')
  Categorias:
@endsection

@section('contenido')

<a href="{{route("categorias.create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Fecha Creado</th>
      <th scope="col">Fecha Modificado</th>
    
    </tr>
  </thead>
  <tbody>
    @foreach ($categorias as $categoria)
    

    <tr>
      <th scope="row">{{$categoria->id}}</th>
      <td>{{$categoria->nombre}}</td>
      <td>{{$categoria->descripcion}}</td>
      <td>{{$categoria->created_at}}</td>
      <td>{{$categoria->updated_at}}</td>
      <td> <a href="{{url("categorias/".$categoria->id."/edit")}}" class="btn btn-success">Editar</a></td>
     
      @if(Session::get('user')->rol->nombre=="administrador")
      <td><form method="post" action="{{url("categorias/".$categoria->id)}}">
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