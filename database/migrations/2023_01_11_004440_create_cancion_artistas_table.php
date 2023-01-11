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
        Schema::create('cancion_artistas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('IdCancion')->constrained('cancions')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('IdArtistas')->constrained('artistas')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cancion_artistas');
    }
};
