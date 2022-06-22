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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_emisor');
            $table->string('direccion_emisor');
            $table->string('ciudad_emisor');
            $table->string('email_emisor');
            $table->string('telefono_emisor');
            $table->string('descripcion');
            $table->bigInteger('id_area')->unsigned();
            $table->timestamps();

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
        Schema::dropIfExists('consultas');
    }
};
