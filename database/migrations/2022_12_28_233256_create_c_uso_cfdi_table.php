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
        Schema::create('c_uso_cfdi', function (Blueprint $table) {
            $table->string('clave', 4);
            $table->string('descripcion', 256);
            $table->boolean('persona_fisica');
            $table->boolean('persona_moral');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('c_uso_cfdi');
    }
};
