<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropForeingkeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       

        //Eliminar foreinkeys de users:

        Schema::table('users', function (Blueprint $table) {
        
            $table->dropForeign('users_cliente_id_foreign');
            $table->dropColumn('cliente_id');

            $table->dropForeign('users_rol_id_foreign');
            $table->dropColumn('rol_id');

        });


          //Eliminar foreinkeys de ventas:

            Schema::table('ventas', function (Blueprint $table) {
        
                $table->dropForeign('ventas_cliente_id_foreign');
                $table->dropColumn('cliente_id');     
    
            });

    
        //Eliminar foreinkeys de telefonos_cliente:

        Schema::table('telefonos_cliente', function (Blueprint $table) {
        
                $table->dropForeign('telefonos_cliente_cliente_id_foreign');
                $table->dropColumn('cliente_id');     
        
                });

                
        //Eliminar foreinkeys de telefonos_provedor:

        Schema::table('telefonos_provedor', function (Blueprint $table) {
        
            $table->dropForeign('telefonos_provedor_provedor_id_foreign');
            $table->dropColumn('provedor_id');     
    
            });

       //Eliminar foreinkeys de suministros:

        Schema::table('suministros', function (Blueprint $table) {
        
            $table->dropForeign('suministros_producto_id_foreign');
            $table->dropColumn('producto_id');   

            $table->dropForeign('suministros_provedor_id_foreign');
            $table->dropColumn('provedor_id');   
    
            });


      //Eliminar foreinkeys de productos:

        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign('productos_categoria_id_foreign');
            $table->dropColumn('categoria_id');
        });


        //Eliminar foreinkeys de detalles_venta:

        Schema::table('detalles_venta', function (Blueprint $table) {
                $table->dropForeign('detalles_venta_venta_cod_foreign');
                $table->dropColumn('venta_cod');

                $table->dropForeign('detalles_venta_producto_id_foreign');
                $table->dropColumn('producto_id');
        });

        
//Eliminar foreinkeys de detalles_venta:

    Schema::table('envios', function (Blueprint $table) {
        $table->dropForeign('envios_venta_cod_foreign');
        $table->dropColumn('venta_cod');

     
});

//Eliminar foreinkeys de detalles_venta:

    Schema::table('imagenes_producto', function (Blueprint $table) {
        $table->dropForeign('imagenes_producto_producto_id_foreign');
        $table->dropColumn('producto_id');

     
});

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
        
      //Agregar foreinkeys de users:

        Schema::table('users', function (Blueprint $table) {
        
            $table->unsignedBigInteger('rol_id');
            $table->foreign('rol_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');

        });


          //Agregar foreinkeys de ventas:

            Schema::table('ventas', function (Blueprint $table) {
        
                $table->unsignedBigInteger('cliente_id');
                $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');  
    
            });

    
        //Agregar foreinkeys de telefonos_cliente:

        Schema::table('telefonos_cliente', function (Blueprint $table) {
        
            $table->unsignedBigInteger('cliente_id');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');     
        
                });

                
        //Agregar foreinkeys de telefonos_provedor:

        Schema::table('telefonos_provedor', function (Blueprint $table) {
        
            $table->unsignedBigInteger('provedor_id');
            $table->foreign('provedor_id')->references('id')->on('provedores')->onDelete('cascade')->onUpdate('cascade');  
    
            });

       //Agregar foreinkeys de suministros:

        Schema::table('suministros', function (Blueprint $table) {
        
            $table->unsignedBigInteger('provedor_id');
            $table->foreign('provedor_id')->references('id')->on('provedores')->onDelete('cascade')->onUpdate('cascade');
            
            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
    
            });


      //Agregar foreinkeys de productos:

        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
        });


     //Agregar foreinkeys de detalles_venta:

        Schema::table('detalles_venta', function (Blueprint $table) {
            $table->unsignedBigInteger('venta_cod');
            $table->foreign('venta_cod')->references('cod')->on('ventas')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('producto_id');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');
        });

        
//Agregar foreinkeys de detalles_venta:

    Schema::table('envios', function (Blueprint $table) {
        $table->unsignedBigInteger('venta_cod');
        $table->foreign('venta_cod')->references('cod')->on('ventas')->onDelete('cascade')->onUpdate('cascade');

     
});

//Agregar foreinkeys de detalles_venta:

    Schema::table('imagenes_producto', function (Blueprint $table) {
        $table->unsignedBigInteger('producto_id');
        $table->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade')->onUpdate('cascade');

     
});





    }
}
