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
        Schema::create('detalle__ventas', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('venta_id');
            $table->foreign('venta_id')->references('id')->on('ventas');

            $table->unsignedBigInteger('pelicula_id');
            $table->foreign('pelicula_id')->references('id')->on('peliculas');

            $table->integer('cantidad');
            $table->decimal('precio');
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
        Schema::dropIfExists('detalle__ventas');
    }
};
