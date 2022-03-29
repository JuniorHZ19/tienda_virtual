
@extends('layaouts/layaout')

@section('titulo')
  Editar Detalle Venta:
@endsection

@section('contenido')

<form method="post" action="{{url("/".$cliente_id.'/'.$venta_cod."/detalles_venta"."/".$detalles_venta_id)}}" enctype="multipart/form-data" >
    @csrf
    @method("PUT")

    <div class="form-group">

      <label for="categoria_id">Categoria: </label>
     
      <select id="selecteCategorias" class="form-control" name="categoria_id">
     
         @foreach ($categorias as $categoria)
         @if($categoria->id==$detalle_venta->categoria_id)
     
         <option value="{{ $categoria->id }}" selected>{{$categoria->nombre}}</option>
         @else
         <option value="{{ $categoria->id }}" >{{$categoria->nombre}}</option>
         @endif
     
         @endforeach
        
       </select>
       
       <label for="producto_id">Producto: </label>
     
       <select id="selectProductos" class="form-control" name="producto_id">
         <input type="hidden" id="idProducto" value="{{$detalle_venta->id}}">
          
       </select>
     
     </div>

     <div class="form-group">
      <label id="lbl_precio_unitario" for="precio_unitario"> </label>
      <input id="precio_unitario" type="hidden" class="form-control" name="precio_unitario"  value="{{$detalle_venta->precio}}">
    </div>
    

      <div class="form-group">
        <label for="cantidad">Cantidad: </label>
        <input type="text" class="form-control" name="cantidad" value="{{$detalle_venta->pivot->cantidad}}">
      </div>

    
 
      <div class="form-group">
        <label for="impuestos">Impuestos: </label>
        <input type="text" class="form-control" name="impuestos" value="{{$detalle_venta->pivot->impuestos}}">
       
    </div>
 

  <button type="submit" class="btn btn-primary">Aceptar</button>


</form>

@endsection

@section('scripts')
    <!-- Scripts específicos de esta vista -->
    <script>
        
        let $selectCategoria = document.getElementById('selecteCategorias');
        let $lblPrecioProducto = document.getElementById('lbl_precio_unitario');
        let $inputPrecioProducto = document.getElementById('precio_unitario');
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


async function SelecionarPrecio(categoria_id) {
    try {

 
        const respuesta = await fetch('http://localhost:80/app-laravel/public/api/'+categoria_id+'/productos');
            
        const datos = await respuesta.json();
    
        datos.map(function(producto) {
             if (producto.id == $selectProductos.value) {
              console.log(producto.id);
                 $inputPrecioProducto.value=producto.precio;
                 $lblPrecioProducto.textContent="Precio Unitario :  S/"+producto.precio;
              }
            })
       
         
         
        
        // También puedes hacer cualquier otra cosa con los datos, como mostrarlos en tu página HTML
    } catch (error) {
        console.error('Error al obtener usuarios:', error);
    }
}
 

document.addEventListener('DOMContentLoaded',function(){
      
      let categoria_id = $selectCategoria.value;
         obtenerProductos(categoria_id );
         SelecionarPrecio(categoria_id);
    });



$selectCategoria.addEventListener('change',function(){
    let categoria_id = $selectCategoria.value;
    obtenerProductos(categoria_id);
    SelecionarPrecio(categoria_id);
        })



 $selectProductos.addEventListener('change',function(){
      
      let categoria_id = $selectCategoria.value;
      SelecionarPrecio(categoria_id);


        })


    </script>
@endsection