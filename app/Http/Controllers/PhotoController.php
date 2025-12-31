<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function index()
    {
        return view('admin.photo.index', [
            'photos' => Photo::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png,webp',
            'nama_kegiatan' => 'required|string|max:255',
            'category' => 'required|string|in:Literasi Digital,Literasi Sains,Literasi Numeric,Literasi Baca Tulis,Literasi Finansial,Literasi Budaya',
        ]);

        $image = $request->file('photo');
        $randName = time();
        $extension = $image->getClientOriginalExtension();
        $filename = "{$randName}.{$extension}";
        $path = $image->storeAs('photos', $filename, 'public');

        Photo::create([
            'image' => $path,
            'judul' => $request->nama_kegiatan,
            'category' => $request->category, // <-- simpan kategori
        ]);

        return redirect()->route('photo')->with('success', 'Foto berhasil diupload!');
    }

    public function update(Request $request, $id)
    {
        $photo = Photo::findOrFail($id);

        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'category' => 'required|string|in:Literasi Digital,Literasi Sains,Literasi Numeric,Literasi Baca Tulis,Literasi Finansial,Literasi Budaya',
        ]);

        if ($request->hasFile('photo')) {
            if ($photo->image && file_exists(public_path('storage/' . $photo->image))) {
                unlink(public_path('storage/' . $photo->image));
            }
            $file = $request->file('photo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('photos', $filename, 'public');
            $photo->image = $path;
        }

        $photo->judul = $request->nama_kegiatan;
        $photo->category = $request->category; // <-- update kategori
        $photo->save();

        return redirect()->route('photo')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $photo = Photo::findOrFail($id);

        // Hapus file foto dari storage
        if ($photo->image && file_exists(public_path('storage/' . $photo->image))) {
            unlink(public_path('storage/' . $photo->image));
        }

        $photo->delete();

        return redirect()->route('photo')->with('success', 'Foto berhasil dihapus!');
    }

    public function publicIndex()
    {
        $photos = Photo::orderBy('id', 'desc')->get();
        return view('foto.foto', compact('photos'));
    }
}
