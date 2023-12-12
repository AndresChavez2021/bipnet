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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string('Codigo');
            $table->datetime('fecha');
            $table->float('monto_total');
            $table->unsignedBigInteger('id_cliente');
            $table->unsignedBigInteger('id_empleado');
            $table->unsignedBigInteger('id_oportunidad');
            $table->unsignedBigInteger('id_estado');
            $table->foreign('id_cliente')->references('id')->on('clientes')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_empleado')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ventas');
    }
};
