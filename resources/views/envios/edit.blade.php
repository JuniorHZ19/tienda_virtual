
@extends('layaouts/layaout')

@section('titulo')
  Editar Envios:
@endsection

@section('contenido')

<form method="post" action="{{url("/".$cliente_id.'/'.$venta_cod."/envios"."/".$cod_envio)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">

      <label for="estado">Estado: </label>
   
      <select class="form-control" name="estado_envio">
        @php 
    
        $opciones=['Entregado','Pendiente','No recibido'];
    
        @endphp
    
        @foreach ($opciones as $opcion)
        
        @if($envio->estado_envio==$opcion)
        <option value="{{$opcion}}" selected>{{$opcion}} </option>
        @else
        <option value="{{$opcion}}">{{$opcion}}</option>

        @endif

        @endforeach
      </select>
     </div>

     <div class="form-group">
      <label for="fecha_envio">Fecha envio:	:</label>
      <input type="date" name="fecha_envio" class="form-control" value={{$envio->fecha_envio}}>
    </div>

    <div class="form-group">
      <label for="fecha_entrega">Fecha entrega:	</label>
      <input type="date" name="fecha_entrega" class="form-control" value={{$envio->fecha_entrega}} >
    </div>
  
  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>

@endsection
