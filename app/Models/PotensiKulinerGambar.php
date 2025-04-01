<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiKulinerGambar extends Model
{
    use HasFactory;

    protected $table = 'potensi_kuliner_gambar';

    protected $fillable = ['potensi_kuliner_id', 'file_path'];

    // Relasi balik ke tabel potensi_kuliner
    public function potensiKuliner()
    {
        return $this->belongsTo(PotensiKuliner::class);
    }

}
