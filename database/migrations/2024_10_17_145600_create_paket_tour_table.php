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
        Schema::create('paket_tour', function (Blueprint $table) {
            $table->id();
            $table->string('nama_paket');
            $table->string('slug')->unique();
            $table->text('isi_paket');
            $table->string('gambar');
            $table->decimal('harga_min', 10, 2);
            $table->decimal('harga_max', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_tour');
    }
};
