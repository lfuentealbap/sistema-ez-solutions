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
        Schema::create('ordenes_trabajos', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha');
            $table->string('nombre_colaborador');
            $table->string('rut_cliente');
            $table->string('rut_trabajador');
            $table->string('direccion');
            $table->string('ciudad');
            $table->string('tipo_requerimiento');
            $table->string('detalles_equipo');
            $table->string('descripcion_solucion');
            $table->text('observaciones');
            $table->bigInteger('id_area')->unsigned();
            $table->timestamps();

            $table->foreign('id_area')->references('id')->on('areas');
            $table->foreign('rut_cliente')->references('rut')->on('clientes');
            $table->foreign('rut_trabajador')->references('rut')->on('trabajadores');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordenes_trabajos');
    }
};
