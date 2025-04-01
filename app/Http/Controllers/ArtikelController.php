<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;

class ArtikelController extends Controller
{
    // Menampilkan daftar artikel (Read)
    public function index()
    {
        $artikels = Artikel::all();
        return view('admin.artikel.index', compact('artikels'));
    }

    // Function untuk mengambil data artikel
    public function getAllArtikels()
    {
        return Artikel::all();
    }

    // Function untuk menampilkan view artikel
    public function showUserArtikel()
    {
        $artikels = $this->getAllArtikels();  // Ambil data artikel
        return view('artikel', compact('artikels'));  // Kirim ke view
    }

    // Menampilkan detail artikel berdasarkan slug
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        return view('artikel-detail', compact('artikel'));
    }

    // Menampilkan form untuk menambah artikel (Create)
    public function create()
    {
        return view('admin.artikel.create');
    }

    // Menyimpan data artikel baru (Store)
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'isi' => 'required|string',
        ]);

        // Proses upload gambar
        if ($request->hasFile('gambar')) {
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/artikel'), $fileName);
            $validatedData['gambar'] = $fileName;
        }

        // Simpan data Artikel
        Artikel::create($validatedData);
        session()->flash('success', 'Data Artikel Berhasil Ditambahkan');

        return redirect()->route('admin.artikel.index');
    }

    // Menampilkan form untuk mengedit artikel (Edit)
    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    // Memperbarui data artikel (Update)
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'tanggal' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'isi' => 'required|string',
        ]);

        $artikel = Artikel::findOrFail($id);

        // Cek apakah ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if (file_exists(public_path('images/artikel/' . $artikel->gambar))) {
                unlink(public_path('images/artikel/' . $artikel->gambar));
            }

            // Upload gambar baru
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/artikel'), $fileName);
            $validatedData['gambar'] = $fileName;
        }

        // Update data artikel
        $artikel->update($validatedData);
        session()->flash('success', 'Data Artikel Berhasil Diperbarui');

        return redirect()->route('admin.artikel.index');
    }

    // Menghapus artikel (Delete)
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus gambar dari server
        if (file_exists(public_path('images/artikel/' . $artikel->gambar))) {
            unlink(public_path('images/artikel/' . $artikel->gambar));
        }

        // Hapus artikel
        $artikel->delete();
        session()->flash('success', 'Data Artikel Berhasil Dihapus');

        return redirect()->route('admin.artikel.index');
    }
}
