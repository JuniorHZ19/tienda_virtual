
@extends('layaouts/layaout')

@section('titulo')
  Agregar Detalle Venta :
@endsection

@section('contenido')

<form method="post" action="{{url("/".$cliente_id."/".$venta_cod."/envios")}}" enctype="multipart/form-data" >
    @csrf

    <div class="form-group">

      <label for="estado">Estado: </label>
   
      <select class="form-control" name="estado_envio">
        @php 
    
        $opciones=['Entregado','Pendiente','No recibido'];
    
        @endphp
    
        @foreach ($opciones as $opcion)
        
        <option value="{{$opcion}}">{{$opcion}}</option>
 
      @endforeach
      </select>
     </div>

     <div class="form-group">
      <label for="fecha_envio">Fecha envio:	:</label>
      <input type="date" name="fecha_envio" class="form-control" >
    </div>

    <div class="form-group">
      <label for="fecha_entrega">Fecha entrega:	</label>
      <input type="date" name="fecha_entrega" class="form-control" >
    </div>
  
 
 
  <button type="submit" class="btn btn-primary">Agregar</button>


</form>


@endsection

