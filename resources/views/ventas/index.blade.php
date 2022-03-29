@extends('layaouts/layaout')

@section('titulo')
  Ventas:
@endsection

@section('contenido')

<a href="{{url("/".$cliente_id."/ventas/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Codigo:</th>
      <th scope="col">Fecha_venta:</th>
      <th scope="col">Estado:</th>
      <th scope="col">Descuento:</th>
      <th scope="col">Monto Final:</th>
      <th scope="col">Cliente:</th>


    </tr>
  </thead>
  <tbody>
    @foreach ($ventas as $venta)
    

    <tr>

      <tr>
       
        <td> {{$venta->cod}}</td>
        <td scope="row">{{$venta->created_at}}</td>
  
        <td scope="row">{{$venta->estado_pago}}</td>
        <td scope="row">{{$venta->descuento}}</td>
        <td scope="row">{{$venta->monto_final}}</td>
        <td scope="row">{{$venta->cliente->nombres}}</td>
        <td> <a href="{{url("/".$cliente_id."/".$venta->cod."/detalles_venta")}}" class="btn btn-info">Detalle  Venta</a></td>
        <td> <a href="{{url("/".$cliente_id."/".$venta->cod."/envios")}}" class="btn btn-warning">Envio</a></td>
        
        @if(Session::get('user')->rol->nombre=="administrador")

        <td> <a href="{{url("/".$cliente_id."/"."ventas/".$venta->cod."/edit")}}" class="btn btn-success">Editar</a></td>
        <td><form method="post" action="{{url("/".$cliente_id."/"."ventas/".$venta->cod)}}">
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