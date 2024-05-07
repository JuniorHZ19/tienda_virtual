@extends('layaouts/layaout')

@section('titulo')
  Provedores:
@endsection

@section('contenido')

<a href="{{route('provedores.create')}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">RUC:</th>
      <th scope="col">Nombre Empresa:</th>
      <th scope="col">Correo:</th>
      <th scope="col">Estado:</th>
      <th scope="col">Descripcion:</th>
      <th scope="col">Telefono:</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($provedores as $provedor)
    

    <tr>
      <th scope="row">{{$provedor->id}}</th>
      <th scope="row">{{$provedor->RUC}}</th>
      <td>{{$provedor->nombre_empresa}}</td>
      <td>{{$provedor->correo}}</td>
      <td>{{$provedor->estado}}</td>
      <td>{{$provedor->descripcion}}</td>
      <td>{{$provedor->telefono}}</td>
      <td> <a href="{{url($provedor->id."/suministros")}}" class="btn btn-info">Suministros</a></td>

    @if(Session::get('user')->rol->nombre=="administrador")
      <td> <a href="{{url("provedores/".$provedor->id."/edit")}}" class="btn btn-success">Editar</a></td>
      <td><form method="post" action="{{url("provedores/".$provedor->id)}}">
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