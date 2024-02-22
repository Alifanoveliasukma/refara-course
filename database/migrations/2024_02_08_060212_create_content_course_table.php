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
        Schema::create('content_course', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kursus');
            $table->string('nama_pembuat');
            $table->string('category_id')->constrained();;
            $table->text('deskripsi_kursus');
            $table->integer('harga_kursus');
            $table->string('status')->default('0');
           $table->string('durasi_kursus')->nullable();
            $table->string('level')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content_course');
    }
};
