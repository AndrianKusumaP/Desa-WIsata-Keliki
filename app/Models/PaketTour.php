<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaketTour extends Model
{
    use HasFactory;

    protected $table = 'paket_tour';

    protected $fillable = [
        'nama_paket',
        'slug',
        'isi_paket',
        'gambar',
        'harga_min',
        'harga_max',
        'sembunyikan',
    ];
    // Method untuk membuat slug dari nama paket secara otomatis
    public function setNamaPaketAttribute($value)
    {
        $this->attributes['nama_paket'] = $value;
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    // Jika ingin menggunakan slug sebagai key di URL
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
