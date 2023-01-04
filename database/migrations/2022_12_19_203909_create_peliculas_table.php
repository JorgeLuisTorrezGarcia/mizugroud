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
        Schema::create('peliculas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')
                  ->constrained('categorias');

            $table->foreignId('horario_id')
                  ->constrained('horarios');
                  
            $table->string('titulo')->unique();
            $table->string('descripcion');
            $table->string('idioma');
            $table->integer('cantidad_t');
            $table->decimal('precio');
            $table->string('image')->nullable();
            $table->enum('status',['ACTIVE','DEACTIVATED'])->default('ACTIVE');
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
        Schema::dropIfExists('peliculas');
    }
};
