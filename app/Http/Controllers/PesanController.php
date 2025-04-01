<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanController extends Controller
{
    public function index()
    {
        $pesans = Pesan::all(); // Ambil semua pesan
        return view('admin.pesan.index', compact('pesans'));
    }

    // Method untuk menyimpan pesan
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nomor_telepon' => 'required|string|max:15',
            'pesan' => 'required|string',
        ]);

        // Simpan pesan ke database
        Pesan::create($validated);
        session()->flash('success', 'Pesan Berhasil Terkirim');

        // Redirect atau tampilkan pesan sukses
        return redirect()->back();
    }

    // Method untuk menghapus pesan
    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);

        $pesan->delete();
        session()->flash('success', 'Data Pesan Berhasil Dihapus');

        return redirect()->route('admin.pesan.index');
    }
}
