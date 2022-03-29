
@extends('layaouts/layaout')

@section('titulo')
  Agregar Suministro :
@endsection

@section('contenido')

<form method="post" action="{{url("/".$provedor_id."/suministros")}}" enctype="multipart/form-data" >
    @csrf

      <div class="form-group">
        <label for="cantidad">Cantidad: </label>
        <input type="text" class="form-control" name="cantidad">
      </div>

      <div class="form-group">
        <label for="precio_unitario">Precio Unitario: </label>
        <input type="text" class="form-control" name="precio_unitario">
      </div>
 
      <div class="form-group">
        <label for="estado">Estado: </label>
      <select class="form-control" name="estado">
        @php 
    
        $opciones=['En proceso','Completado','Rechazado'];
    
        @endphp
    
        @foreach ($opciones as $opcion)
       
        <option value="{{$opcion}}">{{$opcion}}</option>
  
        @endforeach
      </select>
    </div>
 
      <div class="form-group">
        <label for="fecha_suministro">Fecha Suministro: </label>
        <input type="date" class="form-control" name="fecha_suministro">
      </div>

  <div class="form-group">

   <label for="categoria_id">Categoria: </label>

   <select id="selecteCategorias" class="form-control" name="categoria_id">
    
      @foreach ($categorias as $categoria)

      <option value="{{ $categoria->id }}">{{$categoria->nombre}}</option>

      @endforeach
     
    </select>
    
    <label for="producto">Producto: </label>

  <select id="selectProductos" class="form-control" name="producto_id">
   
    
  </select>
  
  </div>

  <button type="submit" class="btn btn-primary">Agregar</button>


</form>


@endsection

@section('scripts')
    <!-- Scripts específicos de esta vista -->
    <script>
        
        let $selectCategoria = document.getElementById('selecteCategorias');
        let $selectProductos = document.getElementById('selectProductos');


        async function obtenerProductos(categoria_id) {
    try {
        const respuesta = await fetch('http://localhost:80/app-laravel/public/api/'+categoria_id+'/productos');
        
        const datos = await respuesta.json();

        $selectProductos.innerHTML='';
        
        datos.forEach(function(producto){
           

           const option=document.createElement('option');

           option.value = producto.id; 

           option.textContent = producto.nombre; 

            // Agregar la opción al elemento select
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

        })

    </script>
@endsection