<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketTourController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PotensiWisataController;
use App\Http\Controllers\PotensiKulinerController;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/profil', function () {
    return view('profil');
});

Route::get('/potensi-wisata', function () {
    return view('potensi-wisata');
});

Route::get('/potensi-kuliner', function () {
    return view('potensi-kuliner');
});

Route::get('/artikel', function () {
    return view('artikel');
});

Route::get('/galeri', function () {
    return view('galeri');
});

Route::get('/tour', function () {
    return view('tour');
});

Route::get('/paket-wisata', function () {
    return view('paket-wisata');
});

Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        // Mengelola Potensi Wisata
        Route::get('/potensi-wisata', [PotensiWisataController::class, 'index'])->name('admin.potensi-wisata.index');
        Route::get('/potensi-wisata/create', [PotensiWisataController::class, 'create'])->name('admin.potensi-wisata.create');
        Route::post('/potensi-wisata/store', [PotensiWisataController::class, 'store'])->name('admin.potensi-wisata.store');
        Route::get('/potensi-wisata/{id}/edit', [PotensiWisataController::class, 'edit'])->name('admin.potensi-wisata.edit');
        Route::put('/potensi-wisata/{id}', [PotensiWisataController::class, 'update'])->name('admin.potensi-wisata.update');
        Route::delete('/potensi-wisata/{id}', [PotensiWisataController::class, 'destroy'])->name('admin.potensi-wisata.destroy');

        // Mengelola Potensi Kuliner
        Route::get('/potensi-kuliner', [PotensiKulinerController::class, 'index'])->name('admin.potensi-kuliner.index');
        Route::get('/potensi-kuliner/create', [PotensiKulinerController::class, 'create'])->name('admin.potensi-kuliner.create');
        Route::post('/potensi-kuliner/store', [PotensiKulinerController::class, 'store'])->name('admin.potensi-kuliner.store');
        Route::get('/potensi-kuliner/{id}/edit', [PotensiKulinerController::class, 'edit'])->name('admin.potensi-kuliner.edit');
        Route::put('/potensi-kuliner/{id}', [PotensiKulinerController::class, 'update'])->name('admin.potensi-kuliner.update');
        Route::delete('/potensi-kuliner/{id}', [PotensiKulinerController::class, 'destroy'])->name('admin.potensi-kuliner.destroy');

        // Mengelola Paket Tour
        Route::get('/paket-tour', [PaketTourController::class, 'index'])->name('admin.paket-tour.index');
        Route::get('/paket-tour/create', [PaketTourController::class, 'create'])->name('admin.paket-tour.create');
        Route::post('/paket-tour/store', [PaketTourController::class, 'store'])->name('admin.paket-tour.store');
        Route::get('/paket-tour/{id}/edit', [PaketTourController::class, 'edit'])->name('admin.paket-tour.edit');
        Route::put('/paket-tour/{id}', [PaketTourController::class, 'update'])->name('admin.paket-tour.update');
        Route::delete('/paket-tour/{id}', [PaketTourController::class, 'destroy'])->name('admin.paket-tour.destroy');

        // Mengelola Galeri
        Route::get('/galeri', [GaleriController::class, 'index'])->name('admin.galeri.index');
        Route::get('/galeri/create', [GaleriController::class, 'create'])->name('admin.galeri.create');
        Route::post('/galeri/store', [GaleriController::class, 'store'])->name('admin.galeri.store');
        Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('admin.galeri.edit');
        Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('admin.galeri.update');
        Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('admin.galeri.destroy');

        // Mengelola Artikel
        Route::get('/artikel', [ArtikelController::class, 'index'])->name('admin.artikel.index');
        Route::get('/artikel/create', [ArtikelController::class, 'create'])->name('admin.artikel.create');
        Route::post('/artikel/store', [ArtikelController::class, 'store'])->name('admin.artikel.store');
        Route::get('/artikel/{id}/edit', [ArtikelController::class, 'edit'])->name('admin.artikel.edit');
        Route::put('/artikel/{id}', [ArtikelController::class, 'update'])->name('admin.artikel.update');
        Route::delete('/artikel/{id}', [ArtikelController::class, 'destroy'])->name('admin.artikel.destroy');

        // Route::get('/pesanan', [PesananController::class, 'index'])->name('admin.pesanan.index');
        Route::get('/pesan', [PesanController::class, 'index'])->name('admin.pesan.index');
        Route::delete('/pesan/{id}', [PesanController::class, 'destroy'])->name('admin.pesan.destroy');
    });
});

Route::get('/potensi-wisata', [PotensiWisataController::class, 'showUserPotensiWisata'])->name('potensi-wisata');
Route::get('/potensi-wisata/{slug}', [PotensiWisataController::class, 'show'])->name('potensi-wisata-detail');
Route::get('/potensi-kuliner', [PotensiKulinerController::class, 'showUserPotensiKuliner'])->name('potensi-kuliner');
Route::get('/potensi-kuliner/{slug}', [PotensiKulinerController::class, 'show'])->name('potensi-kuliner-detail');
Route::get('/tour', [PaketTourController::class, 'showUserPaketTour'])->name('tour');
Route::get('/galeri', [GaleriController::class, 'showUserGaleri'])->name('galeri');
Route::get('/artikel', [ArtikelController::class, 'showUserArtikel'])->name('artikel');
Route::get('/artikel/{slug}', [ArtikelController::class, 'show'])->name('artikel-detail');
// Route::get('/paket-tour/{slug}/pesanan', [PaketTourController::class, 'pesanan'])->name('paket-tour.pesanan');
// Route::post('/pesanan/store', [PesananController::class, 'store'])->name('pesanan.store');

Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/profil', [ProfilController::class, 'index'])->name('profil');
Route::post('/pesan', [PesanController::class, 'store'])->name('pesan.store');
