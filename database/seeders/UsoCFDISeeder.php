<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsoCFDISeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) { 
            \DB::table('c_uso_cfdi')->insert(
                array(
                    'clave' => 'XXXX',
                    'descripcion' => 'Uso CFDI',
                    'persona_fisica' => 1,
                    'persona_moral' => 0
                )
            );
        }
    }
}
