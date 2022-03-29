@extends('layaouts/layaout')

@section('titulo')
  Detalle Venta:
@endsection

@section('contenido')

<a href="{{url("/".$cliente_id."/".$venta_cod."/detalles_venta/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto:</th>
      <th scope="col">Precio Unitario:</th>
      <th scope="col">Cantidad:</th>
      <th scope="col">Impuestos:</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($detalles_venta as $detalle_venta)
    
    <tr>
       
      <td> {{$detalle_venta->pivot->id}}</td>
      <td scope="row">{{$detalle_venta->nombre}}</td>

    
      <td scope="row">{{$detalle_venta->pivot->precio_unitario}}</td>
      <td scope="row">{{$detalle_venta->pivot->cantidad}}</td>
      <td scope="row">{{$detalle_venta->pivot->impuestos}}</td>
    
      @if(Session::get('user')->rol->nombre=="administrador")
      <td> <a href="{{url("/".$cliente_id."/".$venta_cod."/"."detalles_venta/".$detalle_venta->pivot->id."/edit")}}" class="btn btn-success">Editar</a></td>
      <td><form method="post" action="{{url("/".$cliente_id."/".$venta_cod."/"."detalles_venta/".$detalle_venta->pivot->id)}}">
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