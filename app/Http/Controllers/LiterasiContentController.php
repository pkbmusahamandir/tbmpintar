<?php

namespace App\Http\Controllers;

use App\Models\LiterasiContent;
use Illuminate\Http\Request;

class LiterasiContentController extends Controller
{
    public function index()
    {
        $contents = LiterasiContent::orderBy('category')->get();
        return view('admin.literasi.index', compact('contents'));
    }

    public function create()
    {
        $categories = [
            'Literasi Digital',
            'Literasi Sains',
            'Literasi Numeric',
            'Literasi Baca Tulis',
            'Literasi Finansial',
            'Literasi Budaya',
        ];
        return view('admin.literasi.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|unique:literasi_contents,category',
            'description' => 'required|string',
        ]);

        LiterasiContent::create($request->all());

        return redirect()->route('literasi.index')->with('success', 'Deskripsi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $content = LiterasiContent::findOrFail($id);
        $categories = [
            'Literasi Digital',
            'Literasi Sains',
            'Literasi Numeric',
            'Literasi Baca Tulis',
            'Literasi Finansial',
            'Literasi Budaya',
        ];
        return view('admin.literasi.edit', compact('content', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $content = LiterasiContent::findOrFail($id);

        $request->validate([
            'category' => 'required|unique:literasi_contents,category,' . $id,
            'description' => 'required|string',
        ]);

        $content->update($request->all());

        return redirect()->route('literasi.index')->with('success', 'Deskripsi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $content = LiterasiContent::findOrFail($id);
        $content->delete();

        return redirect()->route('literasi.index')->with('success', 'Deskripsi berhasil dihapus!');
    }
}
