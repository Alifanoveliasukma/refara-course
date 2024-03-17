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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peserta_id')->nullable();
            $table->unsignedBigInteger('kursus_id')->nullable();
            $table->unsignedBigInteger('pesanan_id')->nullable();
            $table->unsignedBigInteger('pesanan_detail_id')->nullable();
            $table->unsignedBigInteger('status_masa_aktif')->nullable();

            $table->foreign('kursus_id')->references('id')->on('content_course');
            $table->foreign('pesanan_id')->references('id')->on('pesanan');
            $table->foreign('peserta_id')->references('id')->on('list_peserta');
            $table->foreign('pesanan_detail_id')->references('id')->on('pesanan_detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
