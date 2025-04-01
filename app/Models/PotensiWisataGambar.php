<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotensiWisataGambar extends Model
{
    use HasFactory;

    protected $table = 'potensi_wisata_gambar';

    protected $fillable = ['potensi_wisata_id', 'file_path'];

    public function potensiWisata()
    {
        return $this->belongsTo(PotensiWisata::class);
    }

}
