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
        Schema::create('personas_dependencia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('di_id');
            $table->string('nombrePersona');
            $table->string('areaPersona');
            $table->string('profesionPersona');
            $table->string('cargoPersona');
            $table->string('telefonoPersona')->comment('Extensión');
            $table->string('correoPersona')->nullable();
            $table->foreign('di_id')
                ->references('id')
                ->on('dependencias_informantes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas_dependencia');
    }
};
