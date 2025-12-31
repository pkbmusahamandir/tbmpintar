<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Photo;
use App\Models\Video;
use App\Models\LiterasiContent;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'artikels' => Blog::orderBy('id', 'desc')->limit(3)->get(),
            'photos'   => Photo::orderBy('id', 'desc')->limit(4)->get(),
            'videos'   => Video::orderBy('id', 'desc')->limit(3)->get(),
            'literasi' => LiterasiContent::orderBy('category')->get()
        ]);
    }

    public function berita()
    {
        return view('berita.berita', [
            'artikels' => Blog::orderBy('id', 'desc')->get()
        ]);
    }

    public function detail($slug)
    {
        $artikel = Blog::where('slug', $slug)->first();
        return view('berita.detail', [
            'artikel' => $artikel
        ]);
    }

    public function literasi($slug)
    {
        // mapping slug -> label kategori
        $map = [
            'literasi-digital'      => 'Literasi Digital',
            'literasi-sains'        => 'Literasi Sains',
            'literasi-numeric'      => 'Literasi Numeric',
            'literasi-baca-tulis'   => 'Literasi Baca Tulis',
            'literasi-finansial'    => 'Literasi Finansial',
            'literasi-budaya'       => 'Literasi Budaya',
        ];

        if (!isset($map[$slug])) {
            abort(404);
        }

        $label = $map[$slug];

        // 🔹 Ambil deskripsi dari DB
        $content = LiterasiContent::where('category', $label)->first();
        $description = $content->description ?? 'Belum ada deskripsi untuk kategori ini.';

        // Ambil foto & video
        $photos = \App\Models\Photo::where('category', $label)->latest()->get();
        $videos = \App\Models\Video::where('category', $label)->latest()->get();

        return view('literasi.show', compact('label', 'slug', 'description', 'photos', 'videos'));
    }
}
