<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    // Tampilkan semua data galeri
    public function index()
    {
        $galeri = Galeri::all();
        return view('admin.galeri.index', compact('galeri'));
    }

    // Ambil semua data galeri
    public function getGaleri()
    {
        return Galeri::all();
    }

    // Tampilkan view galeri
    public function showUserGaleri()
    {
        $galeri = $this->getGaleri();  // Ambil data galeri
        return view('galeri', compact('galeri'));
    }

    // Tampilkan form untuk membuat galeri baru
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Simpan galeri baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'required|image|max:10240', // Gambar harus berupa file image dengan ukuran maksimal 10MB
            'deskripsi' => 'required|string',
        ]);

        // Simpan gambar ke folder 'public/images/galeri'
        if ($request->hasFile('gambar')) {
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/galeri'), $fileName);
            $validatedData['gambar'] = $fileName;
        }

        Galeri::create($validatedData);
        session()->flash('success', 'Data Galeri Berhasil Ditambahkan');

        return redirect()->route('admin.galeri.index');
    }

    // Tampilkan form untuk edit galeri
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    // Update galeri di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|max:10240', // Gambar hanya perlu di-update jika ada file baru
            'deskripsi' => 'required|string',
        ]);

        $galeri = Galeri::findOrFail($id);

        // Jika ada gambar baru, hapus gambar lama dan upload yang baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada gambar baru
            if ($galeri->gambar && file_exists(public_path('images/galeri/' . $galeri->gambar))) {
                unlink(public_path('images/galeri/' . $galeri->gambar));
            }

            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/galeri'), $fileName);
            $validatedData['gambar'] = $fileName;
        } else {
            // Jika gambar tidak diupload, gunakan gambar lama
            $validatedData['gambar'] = $galeri->gambar;
        }

        // Update data galeri di database
        $galeri->update($validatedData);
        session()->flash('success', 'Data Galeri Berhasil Diperbarui');

        return redirect()->route('admin.galeri.index');
    }

    // Hapus galeri dari database
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        // Hapus gambar dari folder jika ada
        if ($galeri->gambar && file_exists(public_path('images/galeri/' . $galeri->gambar))) {
            unlink(public_path('images/galeri/' . $galeri->gambar));
        }

        // Hapus data dari database
        $galeri->delete();
        session()->flash('success', 'Data Galeri Berhasil Dihapus');

        return redirect()->route('admin.galeri.index');
    }
}
