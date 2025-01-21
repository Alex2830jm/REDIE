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
        Schema::create('ce_archivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ce_id');
            $table->string('nombreArchivo');
            $table->year('yearPost');
            $table->stat('urlFile');

            $table->foreign('ce_id')
                ->references('id')
                ->on('cuadro_estadisticos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ce_archivos');
    }
};
