<?php

namespace App\Http\Controllers;

use App\Models\PaketTour;
use Illuminate\Http\Request;

class PaketTourController extends Controller
{
    // Menampilkan daftar Paket Tour
    public function index()
    {
        $paketTour = PaketTour::all(); // Ambil semua data paket tour
        return view('admin.paket-tour.index', compact('paketTour'));
    }

    public function showUserPaketTour()
    {
        // Ambil semua data paket tour dari database
        $paketTour = PaketTour::all();

        // Kirim data ke view untuk user
        return view('tour', compact('paketTour'));
    }

    public function pesanan($slug)
    {
        // Cari paket tour berdasarkan slug
        $paketTour = PaketTour::where('slug', $slug)->firstOrFail();

        // Kirim data paket tour ke view 'tour.blade.php'
        return view('paket-wisata', compact('paketTour'));
    }


    // Menampilkan form untuk menambahkan Paket Tour baru
    public function create()
    {
        return view('admin.paket-tour.create');
    }

    // Menyimpan Paket Tour baru ke database
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'isi_paket' => 'required|array',  // Pastikan 'isi_paket' berupa array
            'harga_min' => 'required|numeric|min:0',
            'harga_max' => 'required|numeric|min:0|gte:harga_min',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240', // Maks 10MB
            'sembunyikan' => 'required|boolean'
        ]);

        // Simpan file gambar
        if ($request->hasFile('gambar')) {
            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/paket-tour'), $fileName);
            $validatedData['gambar'] = $fileName;
        }

        // Simpan 'isi_paket' sebagai JSON
        $validatedData['isi_paket'] = json_encode($request->input('isi_paket'));

        // Simpan data ke database
        PaketTour::create($validatedData);
        session()->flash('success', 'Data Paket Tour Berhasil Ditambahkan');

        return redirect()->route('admin.paket-tour.index');
    }

    // Menampilkan form edit Paket Tour
    public function edit($id)
    {
        $paketTour = PaketTour::findOrFail($id);
        return view('admin.paket-tour.edit', compact('paketTour'));
    }

    // Memperbarui data Paket Tour yang ada di database
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_paket' => 'required|string|max:255',
            'isi_paket' => 'required|array',  // Pastikan 'isi_paket' berupa array
            'harga_min' => 'required|numeric|min:0',
            'harga_max' => 'required|numeric|min:0|gte:harga_min',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // Maks 10MB
            'sembunyikan' => 'required|boolean'
        ]);

        $paketTour = PaketTour::findOrFail($id);

        // Simpan file gambar jika diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada gambar baru
            if ($paketTour->gambar && file_exists(public_path('images/paket-tour/' . $paketTour->gambar))) {
                unlink(public_path('images/paket-tour/' . $paketTour->gambar));
            }

            $fileName = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('images/paket-tour'), $fileName);
            $validatedData['gambar'] = $fileName;
        } else {
            // Jika gambar tidak diupload, gunakan gambar lama
            $validatedData['gambar'] = $paketTour->gambar;
        }

        // Simpan 'isi_paket' sebagai JSON
        $validatedData['isi_paket'] = json_encode($request->input('isi_paket'));

        // Update data di database
        $paketTour->update($validatedData);
        session()->flash('success', 'Data Paket Tour Berhasil Diperbarui');

        return redirect()->route('admin.paket-tour.index');
    }

    // Menghapus Paket Tour dari database
    public function destroy($id)
    {
        $paketTour = PaketTour::findOrFail($id);

        // Hapus gambar dari folder jika ada
        if ($paketTour->gambar && file_exists(public_path('images/paket-tour/' . $paketTour->gambar))) {
            unlink(public_path('images/paket-tour/' . $paketTour->gambar));
        }

        // Hapus data dari database
        $paketTour->delete();
        session()->flash('success', 'Data Paket Tour Berhasil Dihapus');

        return redirect()->route('admin.paket-tour.index');
    }
}
