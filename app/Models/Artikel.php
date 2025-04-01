<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikel'; // Nama tabel

    // Tambahkan field 'tanggal' ke dalam $dates atau $casts
    protected $dates = ['tanggal'];

    // atau alternatifnya menggunakan $casts
    protected $casts = [
        'tanggal' => 'date', // Ini akan meng-cast field tanggal sebagai objek date
    ];

    // Tentukan atribut yang bisa diisi (fillable)
    protected $fillable = ['judul', 'slug', 'tanggal', 'gambar', 'isi'];

    // Mutator untuk membuat slug otomatis dari nama tempat
    public function setJudulAttribute($value)
    {
        $this->attributes['judul'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Method untuk menemukan kuliner wisata berdasarkan slug, bukan ID
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
