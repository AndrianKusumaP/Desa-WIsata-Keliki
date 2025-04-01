<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PotensiWisata;
use App\Models\PotensiWisataGambar;

class PotensiWisataController extends Controller
{
    // Menampilkan daftar potensi wisata (Read)
    public function index()
    {
        $potensiWisata = PotensiWisata::with('gambar')->get();
        return view('admin.potensi-wisata.index', compact('potensiWisata'));
    }

    // Ambil semua potensi wisata (tanpa view)
    public function getPotensiWisata()
    {
        return PotensiWisata::with('gambar')->get();  // Kembalikan collection
    }

    // Menampilkan view potensi wisata untuk user
    public function showUserPotensiWisata()
    {
        $potensiWisata = $this->getPotensiWisata();  // Ambil data
        return view('potensi-wisata', compact('potensiWisata'));  // Kirim ke view
    }

    public function show($slug)
    {
        // Ambil potensi kuliner berdasarkan slug
        $potensiWisata = PotensiWisata::where('slug', $slug)->with('gambar')->firstOrFail();

        // Tampilkan halaman detail dengan data potensi kuliner
        return view('potensi-wisata-detail', compact('potensiWisata'));
    }

    // Menampilkan form untuk menambah potensi wisata (Create)
    public function create()
    {
        return view('admin.potensi-wisata.create');
    }

    // Menyimpan data potensi wisata baru (Store)
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'required|array|max:3|min:3',  // Batasi jumlah gambar maksimal 3
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        // Simpan data Potensi Kuliner
        $potensiWisata = PotensiWisata::create($validatedData);

        // Simpan gambar-gambar terkait
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $fileName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/potensi-wisata'), $fileName);

                // Simpan path gambar di database
                PotensiWisataGambar::create([
                    'potensi_wisata_id' => $potensiWisata->id,
                    'file_path' => $fileName,
                ]);
            }
        }
        session()->flash('success', 'Data Potensi Wisata Berhasil Ditambahkan');

        return redirect()->route('admin.potensi-wisata.index');
    }

    // Menampilkan form untuk mengedit potensi wisata (Edit)
    public function edit($id)
    {
        $potensiWisata = PotensiWisata::findOrFail($id);
        return view('admin.potensi-wisata.edit', compact('potensiWisata'));
    }

    // Memperbarui data potensi wisata (Update)
    public function update(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_wisata' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|array|max:3',  // Batasi jumlah gambar maksimal 3
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $potensiWisata = PotensiWisata::findOrFail($id);
        $potensiWisata->update($validatedData);

        // Hapus gambar lama jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar yang sudah ada
            foreach ($potensiWisata->gambar as $gbr) {
                if (file_exists(public_path('images/potensi-wisata/' . $gbr->file_path))) {
                    unlink(public_path('images/potensi-wisata/' . $gbr->file_path));
                }
                $gbr->delete();
            }

            // Upload gambar baru
            foreach ($request->file('gambar') as $gambar) {
                $fileName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/potensi-wisata'), $fileName);

                PotensiWisataGambar::create([
                    'potensi_wisata_id' => $potensiWisata->id,
                    'file_path' => $fileName,
                ]);
            }
        }
        session()->flash('success', 'Data Potensi Wisata Berhasil Diperbarui');

        return redirect()->route('admin.potensi-wisata.index');
    }

    // Menghapus potensi wisata (Delete)
    public function destroy($id)
    {
        $potensiWisata = PotensiWisata::findOrFail($id);

        // Hapus gambar dari server
        foreach ($potensiWisata->gambar as $gbr) {
            if (file_exists(public_path('images/potensi-wisata/' . $gbr->file_path))) {
                unlink(public_path('images/potensi-wisata/' . $gbr->file_path));
            }
            $gbr->delete(); // Hapus gambar dari database
        }

        // Hapus potensi kuliner
        $potensiWisata->delete();
        session()->flash('success', 'Data Potensi Wisata Berhasil Dihapus');

        return redirect()->route('admin.potensi-wisata.index');
    }
}
