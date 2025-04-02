<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     
    public function up(): void
    {
        Schema::create('puntos_gps', function (Blueprint $table) {
            $table->id();
            $table->string('modelo_dispositivo');
            $table->string('imei');
            $table->string('tiempo_dispositivo');
            $table->string('placa_vehiculo');
            $table->string('version_fimware');
            $table->string('longitud');
            $table->string('latitud');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntos_gps');
    }
};
