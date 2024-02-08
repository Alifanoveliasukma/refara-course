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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kursus')->nullable();;
            $table->unsignedBigInteger('id_peserta')->nullable();;
            $table->timestamps();

            $table->foreign('id_kursus')->references('id')->on('content_course');
            $table->foreign('id_peserta')->references('id')->on('list_peserta');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
