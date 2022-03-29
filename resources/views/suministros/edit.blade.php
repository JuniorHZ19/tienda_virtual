
@extends('layaouts/layaout')

@section('titulo')
  Editar suministro:
@endsection

@section('contenido')

<form method="post" action="{{url("/".$provedor_id.'/suministros'."/".$suministro_id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">
      <label for="cantidad">Cantidad: </label>
      <input type="text" class="form-control" name="cantidad" value={{$suministro->pivot->cantidad}}>
    </div>

    <div class="form-group">
      <label for="precio_unitario">Precio Unitario: </label>
      <input type="text" class="form-control" name="precio_unitario" value={{$suministro->pivot->precio_unitario}}>
    </div>

    <div class="form-group">
      <label for="estado">Estado: </label>
    <select class="form-control" name="estado">
      @php 
  
     $opciones=['En proceso','Completado','Rechazado'];
  
      @endphp
  
      @foreach ($opciones as $opcion)
      @if($opcion == $suministro->pivot->estado)
      <option value="{{$opcion}}" seleceted>{{$opcion}}</option>
      @else
      <option value="{{$opcion}}" >{{$opcion}}</option>
      @endif
      @endforeach
    </select>
  </div>

    <div class="form-group">
      <label for="fecha_suministro">Fecha Suministro: </label>
      <input type="date" class="form-control" name="fecha_suministro" value={{$suministro->pivot->fecha_suministro}}>
    </div>

<div class="form-group">

 <label for="categoria_id">Categoria: </label>

 <select id="selecteCategorias" class="form-control" name="categoria_id">

    @foreach ($categorias as $categoria)
    @if($categoria->id==$suministro->categoria_id)

    <option value="{{ $categoria->id }}" selected>{{$categoria->nombre}}</option>
    @else
    <option value="{{ $categoria->id }}" >{{$categoria->nombre}}</option>
    @endif

    @endforeach
   
  </select>
  
  <label for="producto_id">Producto: </label>

  <select id="selectProductos" class="form-control" name="producto_id">
    <input type="hidden" id="idProducto" value="{{$suministro->id}}">
   
  </select>

</div>

  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>

@endsection

@section('scripts')
    <!-- Scripts específicos de esta vista -->
    <script>
        
        let $selectCategoria = document.getElementById('selecteCategorias');
        let $selectProductos = document.getElementById('selectProductos');
        let $idproducto = document.getElementById('idProducto').value;

        async function obtenerProductos(categoria_id ) {

    try {
        const respuesta = await fetch('http://localhost:80/app-laravel/public/api/'+categoria_id+'/productos');
        
        const datos = await respuesta.json();

        $selectProductos.innerHTML='';
        
        datos.forEach(function(producto){
           

           const option=document.createElement('option');

           option.value = producto.id; 

           option.textContent = producto.nombre; 

            // Agregar la opción al elemento select 

           if (producto.id == $idproducto) {
             option.selected = true;
            }

            $selectProductos.appendChild(option);
         

        })
         
        
        // También puedes hacer cualquier otra cosa con los datos, como mostrarlos en tu página HTML
    } catch (error) {
        console.error('Error al obtener usuarios:', error);
    }
}

document.addEventListener('DOMContentLoaded',function(){
      
        let categoria_id = $selectCategoria.value;
           obtenerProductos(categoria_id );

      });


  $selectCategoria.addEventListener('change',function(){
        
          let categoria_id = $selectCategoria.value;
             obtenerProductos(categoria_id);

        });


    </script>
@endsection