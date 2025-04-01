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
        Schema::create('potensi_kuliner', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tempat');
            $table->string('slug')->unique();
            $table->text('deskripsi');
            $table->string('lokasi');
            $table->string('kontak');
            $table->string('kisaran_harga');
            $table->string('masakan');
            $table->string('makanan');
            $table->text('fitur');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_kuliner');
    }
};
