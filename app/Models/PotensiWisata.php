<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PotensiWisata extends Model
{
    use HasFactory;

    protected $table = 'potensi_wisata';

    protected $fillable = ['nama_wisata', 'slug', 'deskripsi'];

    public function gambar()
    {
        return $this->hasMany(PotensiWisataGambar::class);
    }

    public function setNamaWisataAttribute($value)
    {
        $this->attributes['nama_wisata'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
