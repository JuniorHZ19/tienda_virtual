
@extends('layaouts/layaout')

@section('titulo')
  Crear Venta :
@endsection

@section('contenido')

<form method="post" action="{{url("/".$cliente_id."/ventas")}}" enctype="multipart/form-data" >
    @csrf

    
    <div class="form-group">
        <label for="estado">Estado: </label>
      <select class="form-control" name="estado_pago">
        @php 
    
        $opciones=['Sin pagar','Pagado a Credito','Pagado a Cash'];
    
        @endphp
    
        @foreach ($opciones as $opcion)
       
        <option value="{{$opcion}}">{{$opcion}}</option>
  
        @endforeach
      </select>
    </div>


      <div class="form-group">
        <label for="descuento">Descuento: </label>
        <input type="text" class="form-control" name="descuento">
      </div>



  <button type="submit" class="btn btn-primary">Agregar</button>


</form>



@endsection