<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $table = 'galeri'; // Nama tabel

    // Tentukan atribut yang bisa diisi (fillable)
    protected $fillable = ['judul', 'gambar', 'deskripsi'];
}
