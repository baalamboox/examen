<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaveProductoServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) { 
            \DB::table('c_clave_producto_servicio')->insert(
                array(
                    'clave' => '12345678',
                    'descripcion' => 'Producto/Servicio'
                )
            );
        }
    }
}
