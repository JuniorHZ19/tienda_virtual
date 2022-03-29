@extends('layaouts/layaout')

@section('titulo')
  Detalle Envio:
@endsection

@section('contenido')

<a href="{{url("/".$cliente_id."/".$venta_cod."/envios/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Estado:</th>
      <th scope="col">Fecha Envio:</th>
      <th scope="col">Fecha Entrega:</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach ($envios as $envio)
    
    <tr>
       
      <td> {{$envio->cod_envio}}</td>
      <td scope="row">{{$envio->estado_envio}}</td>

      <td scope="row">{{$envio->fecha_envio}}</td>
      <td scope="row">{{$envio->fecha_entrega}}</td>
    
      
      <td> <a href="{{url("/".$cliente_id."/".$venta_cod."/"."envios/".$envio->cod_envio."/edit")}}" class="btn btn-success">Editar</a></td>
      
      @if(Session::get('user')->rol->nombre=="administrador")
      <td><form method="post" action="{{url("/".$cliente_id."/".$venta_cod."/"."envios/".$envio->cod_envio)}}">
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