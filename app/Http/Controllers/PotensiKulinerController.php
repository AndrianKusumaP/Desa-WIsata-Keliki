<?php

namespace App\Http\Controllers;

use App\Models\PotensiKuliner;
use App\Models\PotensiKulinerGambar;
use Illuminate\Http\Request;

class PotensiKulinerController extends Controller
{
    // Menampilkan daftar Potensi Kuliner
    public function index()
    {
        $potensiKuliner = PotensiKuliner::with('gambar')->get(); // Ambil semua potensi kuliner dengan gambar terkait
        return view('admin.potensi-kuliner.index', compact('potensiKuliner'));
    }

    // Ambil semua data potensi kuliner dengan gambar
    public function getPotensiKuliner()
    {
        return PotensiKuliner::with('gambar')->get();
    }

    // Tampilkan view potensi kuliner
    public function showUserPotensiKuliner()
    {
        $potensiKuliner = $this->getPotensiKuliner();  // Ambil data
        return view('potensi-kuliner', compact('potensiKuliner'));
    }

    public function show($slug)
    {
        // Ambil potensi kuliner berdasarkan slug
        $potensiKuliner = PotensiKuliner::where('slug', $slug)->with('gambar')->firstOrFail();

        // Tampilkan halaman detail dengan data potensi kuliner
        return view('potensi-kuliner-detail', compact('potensiKuliner'));
    }


    // Menampilkan form untuk menambah Potensi Kuliner
    public function create()
    {
        return view('admin.potensi-kuliner.create');
    }

    // Menyimpan data Potensi Kuliner baru dan gambar
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'required|array|max:3|min:3',  // Batasi jumlah gambar maksimal 3
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'kisaran_harga' => 'required|string|max:255',
            'masakan' => 'required|string|max:255',
            'makanan' => 'required|string|max:255',
            'fitur' => 'required',
        ]);

        // Simpan data Potensi Kuliner
        $potensiKuliner = PotensiKuliner::create($validatedData);

        // Simpan gambar-gambar terkait
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $gambar) {
                $fileName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/potensi-kuliner'), $fileName);

                // Simpan path gambar di database
                PotensiKulinerGambar::create([
                    'potensi_kuliner_id' => $potensiKuliner->id,
                    'file_path' => $fileName,
                ]);
            }
        }
        session()->flash('success', 'Data Potensi Kuliner Berhasil Ditambahkan');

        return redirect()->route('admin.potensi-kuliner.index');
    }

    // Menampilkan form edit Potensi Kuliner dan gambar
    public function edit($id)
    {
        $potensiKuliner = PotensiKuliner::with('gambar')->findOrFail($id); // Ambil potensi kuliner dengan gambar terkait
        return view('admin.potensi-kuliner.edit', compact('potensiKuliner'));
    }

    // Memperbarui data Potensi Kuliner dan gambar
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_tempat' => 'required|string|max:255',
            'deskripsi' => 'required',
            'gambar' => 'nullable|array|max:3',  // Batasi jumlah gambar maksimal 3
            'gambar.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'lokasi' => 'required|string|max:255',
            'kontak' => 'required|string|max:255',
            'kisaran_harga' => 'required|string|max:255',
            'masakan' => 'required|string|max:255',
            'makanan' => 'required|string|max:255',
            'fitur' => 'required',
        ]);

        $potensiKuliner = PotensiKuliner::findOrFail($id);
        $potensiKuliner->update($validatedData);

        // Hapus gambar lama jika ada gambar baru yang diupload
        if ($request->hasFile('gambar')) {
            // Hapus gambar yang sudah ada
            foreach ($potensiKuliner->gambar as $gbr) {
                if (file_exists(public_path('images/potensi-kuliner/' . $gbr->file_path))) {
                    unlink(public_path('images/potensi-kuliner/' . $gbr->file_path));
                }
                $gbr->delete();
            }

            // Upload gambar baru
            foreach ($request->file('gambar') as $gambar) {
                $fileName = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move(public_path('images/potensi-kuliner'), $fileName);

                PotensiKulinerGambar::create([
                    'potensi_kuliner_id' => $potensiKuliner->id,
                    'file_path' => $fileName,
                ]);
            }
        }
        session()->flash('success', 'Data Potensi Kuliner Berhasil Diperbarui');

        return redirect()->route('admin.potensi-kuliner.index');
    }

    // Menghapus Potensi Kuliner dan gambar terkait
    public function destroy($id)
    {
        $potensiKuliner = PotensiKuliner::findOrFail($id);

        // Hapus gambar dari server
        foreach ($potensiKuliner->gambar as $gbr) {
            if (file_exists(public_path('images/potensi-kuliner/' . $gbr->file_path))) {
                unlink(public_path('images/potensi-kuliner/' . $gbr->file_path));
            }
            $gbr->delete(); // Hapus gambar dari database
        }

        // Hapus potensi kuliner
        $potensiKuliner->delete();
        session()->flash('success', 'Data Potensi Kuliner Berhasil Dihapus');

        return redirect()->route('admin.potensi-kuliner.index');
    }
}
