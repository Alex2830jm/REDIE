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
        Schema::create('cuadro_estadisticos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tema_id');
            $table->unsignedBigInteger('di_id');
            $table->string('numeroCE');
            $table->string('nombreCuadroEstadistico');
            $table->string('gradoDesagregacion');
            $table->string('frecuenciaAct');
            $table->foreign('tema_id')
                ->references('id')->on('grupos')
                ->onDelete('cascade');
            $table->foreign('di_id')
                ->references('id')->on('dependencias_informantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuadro_estadisticos');
    }
};
