
@extends('layaouts/layaout')

@section('titulo')
  Agregar Provedor:
@endsection

@section('contenido')

<form style="height: 500px; overflow: auto;"  method="post" action="{{route('provedores.store')}}" enctype="multipart/form-data" >
    @csrf
    <div class="form-group">
        <label for="RUC">RUC:</label>
        <input type="text"  name="RUC" class="form-control" >

    @error('RUC')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
      </div>

  <div class="form-group">
    <label for="nombres">Nombre Empresa:</label>
    <input type="text" name="nombre_empresa" class="form-control" >

    @error('nombre_empresa')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="correo">Correo:</label>
    <input type="email" name="correo" class="form-control" >
    @error('correo')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror

  </div>

  <div class="form-group">
    <label for="estado">Estado:</label>
    <select class="form-control" name="estado">
      <option value="activo">Activo</option>
      <option value="inactivo">Inactivo</option> 
    </select>
    @error('estado')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror

    <div class="form-group">
      <label for="descripcion">Descripcion:</label>
      <input type="text" name="descripcion" class="form-control" >

    @error('descripcion')
    <div class="alert alert-danger mt-2">{{ $message }}</div>
    @enderror
    </div>

  </div>


  <button type="submit"  class="btn btn-primary">Agregar</button>


</form>


@endsection


