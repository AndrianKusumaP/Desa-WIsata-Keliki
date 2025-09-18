<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\GaleriImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    // Menampilkan semua galeri    
    public function index()
    {
        $galeri = Galeri::all();

        foreach ($galeri as $item) {
            $item->first_image = $item->image_paths[0] ?? null;
        }

        return view('admin.galeri.index', compact('galeri'));
    }

    // Ambil semua data galeri
    public function getGaleri()
    {
        return Galeri::all();
    }

    public function showUserGaleri()
    {
        $galeri = Galeri::all();

        foreach ($galeri as $item) {
            $item->first_image = $item->image_paths[0] ?? null;
        }

        return view('galeri', compact('galeri'));
    }

    // Menampilkan form tambah galeri
    public function create()
    {
        return view('admin.galeri.create');
    }

    // Menyimpan data galeri baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $paths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/galeri'), $filename);
                $paths[] = 'images/galeri/' . $filename;
            }
        }

        Galeri::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image_paths' => $paths,
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    // Menampilkan detail galeri
    public function show($slug)
    {
        $galeri = Galeri::where('slug', $slug)->firstOrFail();
        return view('galeri-detail', compact('galeri'));
    }

    // Menampilkan form edit galeri
    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('admin.galeri.edit', compact('galeri'));
    }

    // Update data galeri
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $galeri = Galeri::findOrFail($id);

        $existingImages = $request->input('existing_images', []);
        $currentImages = $galeri->image_paths ?? [];

        $imagesToDelete = array_diff($currentImages, $existingImages);

        foreach ($imagesToDelete as $imgPath) {
            $fullPath = public_path($imgPath);
            if (file_exists($fullPath)) {
                unlink($fullPath);
            }
        }

        $newPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/galeri'), $filename);
                $newPaths[] = 'images/galeri/' . $filename;
            }
        }

        $galeri->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'image_paths' => array_values(array_merge($existingImages, $newPaths)),
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    // Menghapus galeri beserta gambarnya
    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        foreach ($galeri->image_paths ?? [] as $imgPath) {
            $file_path = public_path($imgPath);
            if (file_exists($file_path)) {
                unlink($file_path);
            }
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('success', 'Galeri berhasil dihapus.');
    }
}
