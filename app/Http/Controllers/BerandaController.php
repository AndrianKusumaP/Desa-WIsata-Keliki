<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PotensiWisataController;

class BerandaController extends Controller
{
    public function index()
    {
        // Ambil data dari controller lain
        $artikelController = new ArtikelController();
        $galeriController = new GaleriController();
        $potensiWisataController = new PotensiWisataController();

        $artikels = $artikelController->getAllArtikels();  // Data artikel
        $galeri = $galeriController->getGaleri();  // Data galeri
        $potensiWisata = $potensiWisataController->getPotensiWisata();  // Data wisata

        $galeriPertama = $galeri->slice(0, 5);  // Ambil 5 pertama
        $galeriKedua = $galeri->slice(5, 5);    // Ambil 5 berikutnya

        // Kirim semua data ke view beranda
        return view('beranda', compact('artikels', 'galeriPertama', 'galeriKedua', 'potensiWisata'));
    }
}
