
@extends('layaouts/layaout')

@section('titulo')
  Editar Detalle Venta:
@endsection

@section('contenido')

<form method="post" action="{{url("/".$producto_id."/caracteristicas_producto"."/".$caracteristica_producto_id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">

      <label for="caracteristicas_id">Caracteristica: </label>
        {{$caracteristica_producto->pivot->caracteristicas_id}}
      <select  class="form-control" name="caracteristicas_id">
       
         @foreach ($caracteristicas as $caracteristica)
         
         @if($caracteristica->id==$caracteristica_producto->pivot->caracteristicas_id)
         <option value="{{ $caracteristica->id }}" selected>{{$caracteristica->nombre}}</option>
          @else
          <option value="{{ $caracteristica->id }}" >{{$caracteristica->nombre}}</option>
          @endif
         @endforeach
        
       </select>
     
     </div>

     <div class="form-group">
      <label for="info"> Informacion</label>
      <input  type="text" class="form-control" name="info"  value="{{$caracteristica_producto->pivot->info}}">
    </div>
    
 

  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>

@endsection
