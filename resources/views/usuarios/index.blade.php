@extends('layaouts/layaout')

@section('titulo')
  Usuarios:
@endsection

@section('contenido')

<a href="{{url("/".$cliente_id."/usuarios/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre Usuario:</th>
      <th scope="col">Correo:</th>
      <th scope="col">Password:</th>
      <th scope="col">Rol:</th>
      <th scope="col">Cliente:</th>

  </tr>
  </thead>
  <tbody>
    @foreach ($usuarios as $usuario)
    

    <tr>

      <tr>
       
        <td> {{$usuario->id}}</td>
        <td scope="row">{{$usuario->nombre_usuario}}</td>
        <td scope="row">{{$usuario->correo}}</td>
        <td scope="row">{{$usuario->password}}</td>
        <td scope="row">{{$usuario->rol->nombre}}</td>

        <td scope="row">{{$usuario->cliente->nombres}}</td>

        @if(Session::get('user')->rol->nombre=="administrador")
        <td> <a href="{{url("/".$cliente_id."/"."usuarios/".$usuario->id."/edit")}}" class="btn btn-success">Editar</a></td>
         
        <td><form method="post" action="{{url("/".$cliente_id."/"."usuarios/".$usuario->id)}}">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger">Eliminar </button>
        </form></td>
        @endif

      </tr>
    </tr>

    @endforeach
  </tbody>
</table>

@endsection