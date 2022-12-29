<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClaveUnidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) { 
            \DB::table('c_clave_unidad')->insert(
                array(
                    'clave' => 'kg',
                    'descripcion' => 'Kilogramo'
                )
            );
        }
    }
}
