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
        Schema::create('potensi_wisata_gambar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('potensi_wisata_id')->constrained('potensi_wisata')->onDelete('cascade');
            $table->string('file_path'); // Menyimpan path gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potensi_wisata_gambars');
    }
};
