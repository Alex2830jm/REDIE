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
        Schema::create('dependencias_informantes', function (Blueprint $table) {
            $table->id();
            $table->string('tipoDI')->nullable();
            $table->string('numDI')->nullable();
            $table->string('nombreDI');
            $table->string('domicilioDI');
            $table->string('correoDI')->nullable();
            $table->string('numTelefonoDI')->nullable();
            $table->integer('nivelDI')->comment('1: Dependencias, 2:Unidades Informativas');
            $table->integer('padreDI')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dependencia_informantes');
    }
};
