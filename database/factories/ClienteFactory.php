<?php

namespace Database\Factories;

use App\Models\cliente;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model=cliente::class;
    public function definition()
    {

        

        return [
         
            'nombres' => $this->faker->name,
            'apellidos' => $this->faker->lastName,
            'documento' => $this->faker->unique()->numberBetween($min = 00000000, $max = 9999999),
            'direccion'=>$this->faker->address(),
            'fecha_nacimiento'=>$this->faker->date('Y-m-d','now')
            
        ];
    }
}
