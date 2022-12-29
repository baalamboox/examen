<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormaPagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 10; $i++) { 
            \DB::table('c_forma_pago')->insert(
                array(
                    'clave' => '01',
                    'descripcion' => 'Efectivo'
                )
            );
        }
    }
}
