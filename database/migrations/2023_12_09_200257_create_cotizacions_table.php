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
        Schema::create('cotizacions', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo');
            $table->datetime('fecha');
            $table->float('monto_total')->nullable();
            $table->unsignedBigInteger('id_oportunidad');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_oportunidad')->references('id')->on('oportunidad_de_ventas')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cotizacions');
    }
};
