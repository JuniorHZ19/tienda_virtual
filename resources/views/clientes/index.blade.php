@extends('layaouts/layaout')

@section('titulo')
  Clientes:
@endsection

@section('contenido')

<a href="{{route("clientes.create")}}" class="btn btn-primary">Agregar</a>




<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">documento:</th>
      <th scope="col">nombres:</th>
      <th scope="col">apellidos:</th>
      <th scope="col">direccion:</th>
      <th scope="col">fecha nacimiento:</th>
      <th scope="col">Telefono:</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach ($clientes as $cliente)
    

    <tr>
      <th scope="row">{{$cliente->id}}</th>
      <td>{{$cliente->documento}}</td>
      <td>{{$cliente->nombres}}</td>
      <td>{{$cliente->apellidos}}</td>
      <td>{{$cliente->direccion}}</td>
      <td>{{$cliente->fecha_nacimiento}}</td>
      <td>{{$cliente->telefono}}</td>
      <td> <a href="{{url($cliente->id."/ventas")}}" class="btn btn-info">Ventas</a></td>

      @if(Session::get('user')->rol->nombre=="administrador")
      
      <td> <a href="{{url("/".$cliente->id."/usuarios")}}" class="btn btn-warning">Usuarios</a></td>
      <td> <a href="{{url("clientes/".$cliente->id."/edit")}}" class="btn btn-success">Editar</a></td>
      <td><form method="post" action="{{url("clientes/".$cliente->id)}}">
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