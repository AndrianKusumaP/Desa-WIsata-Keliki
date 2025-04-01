<?php

namespace App\Http\Controllers;
use App\Http\Controllers\PotensiKulinerController;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index() {
        $potensiKulinerController = new PotensiKulinerController();

        $potensiKuliner = $potensiKulinerController->getPotensiKuliner();
        
        return view('profil', compact('potensiKuliner'));
    }
}
