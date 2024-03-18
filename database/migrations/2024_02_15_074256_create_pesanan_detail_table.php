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
        Schema::create('pesanan_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kursus_id')->nullable();
            $table->unsignedBigInteger('peserta_id')->nullable();
            $table->unsignedBigInteger('pesanan_id')->nullable();
            $table->integer('jumlah');
            $table->string('status')->nullable();
            $table->integer('jumlah_harga');
            $table->softDeletes();
            $table->timestamps();

            // Tambahkan onDelete('cascade') untuk memberi tahu database agar melakukan cascade delete
            $table->foreign('kursus_id')->references('id')->on('content_course')->onDelete('cascade');
            $table->foreign('pesanan_id')->references('id')->on('pesanan')->onDelete('cascade');
            $table->foreign('peserta_id')->references('id')->on('list_peserta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_detail');
    }
};
