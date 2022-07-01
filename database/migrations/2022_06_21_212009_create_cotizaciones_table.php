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
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamp('fecha_creacion');
            $table->timestamp('fecha_expiracion');
            $table->integer('neto')->unsigned();
            $table->integer('iva')->unsigned();
            $table->integer('total')->unsigned();
            $table->string('estado')->default('pendiente');
            $table->string('rut_cliente');
            $table->timestamps();

            $table->foreign('rut_cliente')->references('rut')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizaciones');
    }
};
