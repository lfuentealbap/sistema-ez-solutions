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
            $table->string('ciudad');
            $table->string('direccion');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_termino');
            $table->integer('pago')->unsigned();
            $table->string('rut_trabajador');
            $table->string('estado')->default('en curso');
            $table->bigInteger('id_area')->unsigned();
            $table->timestamps();

            $table->foreign('rut_trabajador')->references('rut')->on('trabajadores')->onDelete('cascade');
            $table->foreign('id_area')->references('id')->on('areas')->onDelete('cascade');

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
