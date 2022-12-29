<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegimenFiscalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) { 
            \DB::table('c_regimen_fiscal')->insert(
                array(
                    'clave' => 'XXX',
                    'descripcion' => 'Regimen fiscal',
                    'persona_fisica' => 1,
                    'persona_moral' => 0
                )
            );
        }
    }
}
