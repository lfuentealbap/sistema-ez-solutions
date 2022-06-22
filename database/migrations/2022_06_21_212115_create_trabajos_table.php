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
        Schema::create('trabajos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descripcion');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_termino');
            $table->integer('pago')->unsigned();
            $table->string('rut_trabajador');
            $table->bigInteger('id_area')->unsigned();
            $table->timestamps();

            $table->foreign('rut_trabajador')->references('rut')->on('users');
            $table->foreign('id_area')->references('id')->on('areas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajos');
    }
};
