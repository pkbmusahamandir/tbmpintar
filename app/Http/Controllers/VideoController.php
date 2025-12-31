<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        return view('admin.video.index', [
            'videos' => Video::orderBy('id', 'desc')->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'youtube_code' => 'required|string|max:255',
            'category' => 'required|string|in:Literasi Digital,Literasi Sains,Literasi Numeric,Literasi Baca Tulis,Literasi Finansial,Literasi Budaya',
        ]);

        Video::create([
            'judul' => $request->judul,
            'youtube_code' => $request->youtube_code,
            'category' => $request->category,
        ]);

        return redirect()->route('video')->with('success', 'Video berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'youtube_code' => 'required|string|max:255',
            'category' => 'required|string|in:Literasi Digital,Literasi Sains,Literasi Numeric,Literasi Baca Tulis,Literasi Finansial,Literasi Budaya',
        ]);

        $video->judul = $request->judul;
        $video->youtube_code = $request->youtube_code;
        $video->category = $request->category;
        $video->save();

        return redirect()->route('video')->with('success', 'Video berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('video')->with('success', 'Video berhasil dihapus!');
    }
}
