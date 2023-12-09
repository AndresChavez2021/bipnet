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
        Schema::create('detalle_servicio', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_productos');
            $table->unsignedBigInteger('id_cotizacion');
            $table->foreign('id_productos')->references('id')->on('productos_servicios')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_cotizacion')->references('id')->on('cotizacion')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('detalle_servicio');
    }
};
