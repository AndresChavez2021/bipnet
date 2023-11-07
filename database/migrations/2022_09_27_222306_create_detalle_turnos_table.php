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
        Schema::create('detalle_turnos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idemp');
            $table->unsignedBigInteger('idturn');
            $table->foreign('idemp')->references('id')->on('users');
            $table->foreign('idturn')->references('id')->on('turnos');
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
        Schema::dropIfExists('detalle_turnos');
    }
};
