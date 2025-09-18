<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    // Tentukan tabel yang digunakan
    protected $table = 'pesan';

    // Tentukan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'nama',
        'email',
        'nomor_telepon',
        'pesan',
    ];
}
