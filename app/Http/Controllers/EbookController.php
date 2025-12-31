<?php

namespace App\Http\Controllers;

use App\Models\Ebook;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EbookController extends Controller
{
    public function index()
    {
        $ebooks = Ebook::with('category')->latest()->get();
        return view('admin.ebooks.index', compact('ebooks'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.ebooks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required|digits:4',
            'category_id' => 'required|exists:categories,id',
            'pdf' => 'required|mimes:pdf', // ⬅ Tidak ada batas ukuran
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        $coverPath = $request->file('cover') ? $request->file('cover')->store('covers', 'public') : null;

        Ebook::create([
            'judul' => $request->judul,
            'author' => $request->penulis,
            'publisher' => $request->penerbit,
            'year' => $request->tahun,
            'category_id' => $request->category_id,
            'pdf' => $pdfPath,
            'cover' => $coverPath,
        ]);

        return redirect()->route('ebooks.index')->with('success', 'E-book berhasil ditambahkan.');
    }

    public function edit(Ebook $ebook)
    {
        $categories = Category::all();
        return view('admin.ebooks.edit', compact('ebook', 'categories'));
    }

    public function update(Request $request, Ebook $ebook)
    {
        $request->validate([
            'judul' => 'required',
            'penulis' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required|digits:4',
            'category_id' => 'required|exists:categories,id',
            'pdf' => 'nullable|mimes:pdf', // ⬅ Tidak ada batas ukuran
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'judul' => $request->judul,
            'author' => $request->penulis,
            'publisher' => $request->penerbit,
            'year' => $request->tahun,
            'category_id' => $request->category_id,
        ];

        if ($request->hasFile('pdf')) {
            if ($ebook->pdf) Storage::disk('public')->delete($ebook->pdf);
            $data['pdf'] = $request->file('pdf')->store('pdfs', 'public');
        }

        if ($request->hasFile('cover')) {
            if ($ebook->cover) Storage::disk('public')->delete($ebook->cover);
            $data['cover'] = $request->file('cover')->store('covers', 'public');
        }

        $ebook->update($data);
        return redirect()->route('ebooks.index')->with('success', 'E-book berhasil diperbarui.');
    }

    public function destroy(Ebook $ebook)
    {
        if ($ebook->pdf) Storage::disk('public')->delete($ebook->pdf);
        if ($ebook->cover) Storage::disk('public')->delete($ebook->cover);
        $ebook->delete();

        return redirect()->route('ebooks.index')->with('success', 'E-book berhasil dihapus.');
    }

    public function katalog(Request $request)
    {
        $query = Ebook::with('category');

        if ($request->search) {
            $query->where('judul', 'like', '%' . $request->search . '%')
                ->orWhere('author', 'like', '%' . $request->search . '%');
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        $ebooks = $query->latest()->paginate(12);
        $categories = Category::all();


        return view('katalog.index', compact('ebooks', 'categories'));
    }
}
