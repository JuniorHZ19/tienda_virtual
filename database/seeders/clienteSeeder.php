<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\cliente;

class clienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $cliente1=new cliente();

        $cliente1->documento=525424;
        $cliente1->nombres="mario";
        $cliente1->apellidos="hernadez";
        $cliente1->direccion="lune";
        $cliente1->fecha_nacimiento="1992-02-05";
        $cliente1->save();


        $cliente2=new cliente();

        $cliente2->documento=4895278;
        $cliente2->nombres="sebastian";
        $cliente2->apellidos="rebes";
        $cliente2->direccion="grr";
        $cliente2->fecha_nacimiento="1995-02-05";
        $cliente2->save();

    }
}
