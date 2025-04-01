<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PotensiKuliner extends Model
{
    use HasFactory;

    protected $table = 'potensi_kuliner';

    // Kolom yang bisa diisi
    protected $fillable = ['nama_tempat', 'slug', 'deskripsi', 'lokasi', 'kontak', 'kisaran_harga', 'masakan', 'makanan', 'fitur'];

    // Relasi satu ke banyak dengan tabel gambar
    public function gambar()
    {
        return $this->hasMany(PotensiKulinerGambar::class);
    }

    // Mutator untuk membuat slug otomatis dari nama tempat
    public function setNamaTempatAttribute($value)
    {
        $this->attributes['nama_tempat'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Method untuk menemukan kuliner wisata berdasarkan slug, bukan ID
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
