<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('potensi_kuliner_gambar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('potensi_kuliner_id')->constrained('potensi_kuliner')->onDelete('cascade');
            $table->string('file_path'); // Menyimpan path gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('potensi_kuliner_gambar');
    }
};
