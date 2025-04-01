<?php

namespace App\Http\Controllers;

use App\Models\PotensiWisata;
use App\Models\PaketTour;
use App\Models\Galeri;
use App\Models\Artikel;
use App\Models\PotensiKuliner;
use App\Models\Pesan;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data dari setiap tabel
        $potensiWisataCount = PotensiWisata::count();
        $potensiKulinerCount = PotensiKuliner::count();
        $paketTourCount = PaketTour::count();
        $galeriCount = Galeri::count();
        $artikelCount = Artikel::count();
        $pesanCount = Pesan::count();

        // Kirim data ke view
        return view('admin.dashboard', compact('potensiWisataCount', 'potensiKulinerCount', 'paketTourCount', 'galeriCount', 'artikelCount', 'pesanCount'));
    }
}
