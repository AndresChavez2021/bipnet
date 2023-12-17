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
        Schema::create('pronostico_productos', function (Blueprint $table) {
            $table->id();
            $table->text("ref");
            $table->datetime('fecha');
            $table->float("p10");
            $table->float("p50");
            $table->float("p90");
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
        Schema::dropIfExists('pronostico_productos');
    }
};
