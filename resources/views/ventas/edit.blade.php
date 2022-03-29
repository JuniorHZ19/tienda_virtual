
@extends('layaouts/layaout')

@section('titulo')
  Editar Producto:
@endsection

@section('contenido')

<form method="post" action="{{url("/".$cliente_id.'/ventas'."/".$venta_id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="estado">Estado: </label>
    <select class="form-control" name="estado_pago" value='estado_pago'>
      @php 
  
      $opciones=['Sin pagar','Pagado a Credito','Pagado a Cash'];
  
      @endphp
  
      @foreach ($opciones as $opcion)
       @if($opcion==$venta->estado_pago)

       <option value="{{$opcion}}" seleceted>{{$opcion}}</option>
      @else
      <option value="{{$opcion}}" >{{$opcion}}</option>
      @endif

      @endforeach
    </select>
  </div>


    <div class="form-group">
      <label for="descuento">Descuento: </label>
      <input type="text" class="form-control" name="descuento" value="{{$venta->descuento}}">
    </div>
 

  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>

@endsection