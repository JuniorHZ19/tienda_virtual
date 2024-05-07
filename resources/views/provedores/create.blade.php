
@extends('layaouts/layaout')

@section('titulo')
  Agregar Provedor:
@endsection

@section('contenido')

<form style="height: 500px; overflow: auto;"  method="post" action="{{route('provedores.store')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="RUC">RUC:</label>
        <input type="text"  name="RUC" class="form-control"  value='{{old('RUC')}}'>

    @error('RUC')
    <div class="alert alert-danger mt-2" >{{ $message }}</div>
    @enderror
      </div>

  <div class="form-group">
    <label for="nombre_empresa">Nombre Empresa:</label>
    <input type="text" name="nombre_empresa" class="form-control"  value='{{old('nombre_empresa')}}'>

    @error('nombre_empresa')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="correo">Correo:</label>
    <input type="email" name="correo" class="form-control"  value='{{old('correo')}}' >
    @error('correo')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="telefono">Telefono:</label>
    <input type="text" name="telefono" class="form-control"  value='{{old('telefono')}}' >
  </div>

  <div class="form-group">
    <label for="estado">Estado:</label>
    <select class="form-control" name="estado" value='{{old('estado')}}'>
      <option value="activo">Activo</option>
      <option value="inactivo">Inactivo</option> 
    </select>
    @error('estado')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="descripcion">Descripcion:</label>
      <input type="text" name="descripcion" class="form-control"   value='{{old('descripcion')}}'>

    @error('descripcion')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
    </div>

  </div>


  <button type="submit"  class="btn btn-primary">Agregar</button>


</form>


@endsection


