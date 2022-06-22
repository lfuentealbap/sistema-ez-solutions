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
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->string('rut')->primary();
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('email');
            $table->string('telefono');
            $table->string('password');
            $table->string('direccion');
            $table->string('ciudad');
            //Opcional relacion
            //$table->string('foto');
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
        Schema::dropIfExists('trabajadores');
    }
};
