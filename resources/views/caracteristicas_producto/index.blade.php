@extends('layaouts/layaout')

@section('titulo')
  Detalle Venta:
@endsection

@section('contenido')

<a href="{{url("/".$producto_id."/caracteristicas_producto/create")}}" class="btn btn-primary">Agregar</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Caracteristica:</th>
      <th scope="col">Informacion:</th>
     
    </tr>
  </thead>
  <tbody>
    @foreach ($caracteristicas_producto as $caracteristica_producto)
    
    <tr>
       
      <td> {{$caracteristica_producto->pivot->id}}</td>
      <td> {{$caracteristica_producto->nombre}}</td>
      <td scope="row">{{$caracteristica_producto->pivot->info}}</td>
 
    
      @if(Session::get('user')->rol->nombre=="administrador")
      <td> <a href="{{url("/".$producto_id."/caracteristicas_producto"."/".$caracteristica_producto->pivot->id."/edit")}}" class="btn btn-success">Editar</a></td>
      <td><form method="post" action="{{url("/".$producto_id."/caracteristicas_producto"."/".$caracteristica_producto->pivot->id)}}">
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