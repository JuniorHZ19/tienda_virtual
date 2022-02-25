
@extends('layaouts/layaout')

@section('titulo')
  Esto es el titulo de Compra
@endsection

@section('contenido')

  <x-alerta type="info" message="Bievneido">


    <x-slot name="slot2">
      Este es mi slot secudnadrio
    </x-slot>
    
    Este es el  slot principal
  </x-alerta>


@endsection
