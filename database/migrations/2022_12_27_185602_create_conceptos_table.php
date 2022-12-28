<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->id();
            $table->integer('factura_id');
            $table->string('clave_producto_servicio', 8);
            $table->text('descripcion');
            $table->string('nombre_receptor', 256);
            $table->string('rfc_receptor', 32);
            $table->string('regimen_fiscal', 3);
            $table->string('domicilio_fiscal_receptor', 5);
            $table->string('uso_cfdi', 4);
            $table->string('metodo_pago', 3);
            $table->string('forma_pago', 2);
            $table->string('clave_unidad', 3);
            $table->float('cantidad');
            $table->float('valor_unitario');
            $table->float('importe');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conceptos');
    }
};
