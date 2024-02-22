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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peserta')->nullable();
            $table->unsignedBigInteger('kursus_id')->nullable();
            $table->string('status');
            $table->date('tanggal');
            $table->integer('jumlah_harga');
            $table->timestamps();

            $table->foreign('id_peserta')->references('id')->on('list_peserta');
            $table->foreign('kursus_id')->references('id')->on('content_course');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_pesanan');
    }
};
