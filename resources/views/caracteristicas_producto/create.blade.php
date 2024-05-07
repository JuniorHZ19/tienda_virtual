
@extends('layaouts/layaout')

@section('titulo')
  Agregar Detalle Venta :
@endsection

@section('contenido')

<form method="post" action="{{url("/".$producto_id."/caracteristicas_producto")}}" enctype="multipart/form-data" >
    @csrf

    <div class="form-group">

      <label for="caracteristica_id">Caracteristica: </label>
   
      <select id="selecteCategorias" class="form-control" name="caracteristica_id">
       
         @foreach ($caracteristicas_producto as $caracteristica)
   
         <option value="{{ $caracteristica->id }}">{{$caracteristica->nombre}}</option>
   
         @endforeach
        
       </select>
     
     </div>

     <div class="form-group">
      <label for="info"> Informacion</label>
      <input  type="text" class="form-control" name="info" >
    </div>
    

 
  <button type="submit" class="btn btn-primary">Agregar</button>


</form>


@endsection
