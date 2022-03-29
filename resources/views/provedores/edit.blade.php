
@extends('layaouts/layaout')

@section('titulo')
  Editar Provedor:
@endsection

@section('contenido')

<form method="post" action="{{url("provedores/".$provedor->id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="RUC">RUC:</label>
      <input type="text"  name="RUC" class="form-control" value="{{$provedor->RUC}}">
    </div>

<div class="form-group">
  <label for="nombres">Nombre Empresa:</label>
  <input type="text" name="nombre_empresa" class="form-control"  value="{{$provedor->nombre_empresa}}">
</div>

<div class="form-group">
  <label for="correo">Correo:</label>
  <input type="email" name="correo" class="form-control"   value="{{$provedor->correo}}">
</div>

<div class="form-group">
  <label for="estado">Selecionar Categoria:</label>

  <select class="form-control" name="estado">
    @php 

    $opciones=['activo','inactivo'];

    @endphp

    @foreach ($opciones as $opcion)
    
    @if ($opcion==$provedor->estado)
    <option value="{{$opcion}}" selected>{{$opcion}}</option>

    @else
    <option value="{{$opcion}}">{{$opcion}}</option>

   @endif
  @endforeach
  </select>

  <div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcion" class="form-control" value="{{$provedor->descripcion}}">
  </div>

</div>


  <button type="submit" class="btn btn-primary">Editar</button>


</form>



@endsection