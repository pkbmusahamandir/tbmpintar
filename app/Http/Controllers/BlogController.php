<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // fungsi index
    public function index()
    {
        return view('admin.blog.index', [
            'artikels' => Blog::orderBy('id', 'desc')->get()
        ]);
    }

    // fungsi create
    public function create()
    {
        return view('admin.blog.create');
    }

    // fungsi store
    /*public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'image' => 'required|max:1000|mimes:jpg,jpeg,png,webp',
            'desc'  => 'required|min:20',
        ], [
            'judul.required' => 'Judul wajib diisi!',
            'image.required' => 'Image wajib diisi!',
            'desc.required'  => 'Deskripsi wajib diisi!',
        ]);
        dd($request->all(), $request->file('image'));

        // Simpan gambar utama
        $fileName = time() . '.' . $request->image->extension();
        $request->file('image')->storeAs('public/artikel', $fileName);
        $imagePath = 'storage/artikel/' . $fileName;

        //dd($imagePath);

        // Proses deskripsi (HTML dari Summernote)
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($request->desc, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');
        //dd($dom->saveHTML()); //
        foreach ($images as $img) {
    $src = $img->getAttribute('src');
    // dd($img->getAttribute('src'));
    if (preg_match('/data:image/', $src)) {
        // Ekstrak MIME type
        preg_match('/data:image\/(?<mime>.*?);base64,/', $src, $groups);
        $mime = $groups['mime'];

        // Decode base64
        $base64 = preg_replace('/^data:image\/(.*);base64,/', '', $src);
        $decoded = base64_decode($base64);

        // Penamaan file
        $randName = substr(md5(uniqid()), 6, 6) . '_' . time();
        $relativePath = "artikel/{$randName}.{$mime}";

        // ✅ Simpan ke public/storage/artikel/...
        $publicPath = public_path("storage/" . $relativePath);
        //dd($publicPath);
        // Simpan file
        Image::make($decoded)
            ->resize(1440, 720)
            ->encode($mime, 100)
            ->save($publicPath);

        // Ganti src di HTML Summernote
        $img->setAttribute('src', asset("storage/" . $relativePath));
        $img->setAttribute('class', 'img-responsive');
    }
}

        return redirect()->route('blog')->with('success', 'Data berhasil disimpan');
    }*/

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png,webp',
            'desc'  => 'required|min:20',
        ]);
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }
        // Ambil file gambar
        $image = $request->file('image');
        $randName = time(); // atau bisa pakai Str::random(10)
        $extension = $image->getClientOriginalExtension();
        $filename = "{$randName}.{$extension}";

        // Simpan ke folder storage/app/public/artikel
        $path = $image->storeAs('artikel', $filename, 'public');

        // Simpan ke database
        $blog = new Blog();
        $blog->judul = $request->judul;
        $blog->desc = $request->desc;
        $blog->slug = $slug;
        $blog->image = $path; // simpan path relatif: artikel/namafile.jpg
        $blog->save();

        return redirect()->route('blog')->with('success', 'Data berhasil disimpan');
    }


    // fungsi edit
    public function edit($id)
    {
        $artikel = Blog::find($id);
        return view('admin.blog.edit', [
            'artikel' => $artikel
        ]);
    }
    // fungsi update
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'desc'  => 'required|min:20',
            'image' => 'nullable|mimes:jpg,jpeg,png,webp',
        ]);

        $artikel = Blog::findOrFail($id);

        // Perbarui slug jika judul diubah
        $slug = Str::slug($request->judul);
        $originalSlug = $slug;
        $count = 1;
        while (Blog::where('slug', $slug)->where('id', '!=', $id)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $artikel->judul = $request->judul;
        $artikel->desc = $request->desc;
        $artikel->slug = $slug;

        // Jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::disk('public')->delete($artikel->image);

            // Simpan gambar baru
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('artikel', $filename, 'public');

            $artikel->image = $path;
        }

        $artikel->save();

        return redirect()->route('blog')->with('success', 'Artikel berhasil diperbarui');
    }


    public function destroy($id)
    {
        $artikel = Blog::findOrFail($id);

        // Hapus gambar dari storage
        Storage::disk('public')->delete($artikel->image);

        // Hapus dari database
        $artikel->delete();

        return redirect()->route('blog')->with('success', 'Artikel berhasil dihapus');
    }
}
