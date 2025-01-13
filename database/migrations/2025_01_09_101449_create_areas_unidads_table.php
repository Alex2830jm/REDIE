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
        Schema::create('areas_unidad', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('unidad_id');
            $table->string('nombreArea');
            $table->text('direccionArea')->nullable();

            $table->foreign('unidad_id')
                ->references('id')
                ->on('unidades_informativas')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas_unidads');
    }
};
