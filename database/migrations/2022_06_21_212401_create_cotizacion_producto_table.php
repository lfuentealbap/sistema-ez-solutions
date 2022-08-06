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
        Schema::create('cotizacion_producto', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_cotizacion')->unsigned();
            $table->integer('codigo_producto')->unsigned();
            $table->integer('cantidad')->unsigned();
            $table->integer('subtotal')->unsigned();

            $table->foreign('id_cotizacion')->references('id')->on('cotizaciones');
            $table->foreign('codigo_producto')->references('codigo')->on('productos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cotizacion_producto');
    }
};
