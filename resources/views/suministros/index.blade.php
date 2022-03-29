@extends('layaouts/layaout')

@section('titulo')
  Suministros:
@endsection

@section('contenido')

<a href="{{url("/".$provedor_id."/suministros/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto:</th>
      <th scope="col">Cantidad:</th>
      <th scope="col">Precio Unitario:</th>
      <th scope="col">Estado:</th>
      <th scope="col">Fecha Suministro:</th>
      

    </tr>
  </thead>
  <tbody>
    @foreach ($suministros as $suministro)
    

    <tr>
       
      <td> {{$suministro->pivot->id}}</td>
      <td scope="row">{{$suministro->nombre}}</td>

      <td scope="row">{{$suministro->pivot->cantidad}}</td>
      <td scope="row">{{$suministro->pivot->precio_unitario}}</td>
      <td scope="row">{{$suministro->pivot->estado}}</td>
      <td scope="row">{{$suministro->pivot->fecha_suministro}}</td>

      @if(Session::get('user')->rol->nombre=="administrador")
      <td> <a href="{{url("/".$provedor_id."/"."suministros/".$suministro->pivot->id."/edit")}}" class="btn btn-success">Editar</a></td>

      <td><form method="post" action="{{url("/".$provedor_id."/"."suministros/".$suministro->pivot->id)}}">
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