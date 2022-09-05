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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_gasto');
            $table->string('detalle');
            $table->string('tipo');
            $table->integer('monto')->unsigned();
            $table->string('rut_trabajador');
            $table->timestamp('fecha_gasto');
            $table->foreign('rut_trabajador')->references('rut')->on('trabajadores')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gastos');
    }
};
