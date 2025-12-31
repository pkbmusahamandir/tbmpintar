<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\LiterasiContentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EbookController;


Route::resource('categories', CategoryController::class);
Route::resource('ebooks', EbookController::class);

Route::get('/', [AppController::class, 'index']);

Route::get('/berita', [AppController::class, 'berita']);

Route::get('/detail/{slug}', [AppController::class, 'detail']);
Route::get('/detail/{slug}', [AppController::class, 'detail'])->name('blog.detail');


Route::get('/foto', function () {
    return view('foto.foto');
});

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

Route::get('/blog', [BlogController::class, 'index'])->name('blog')->middleware('auth');
Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create')->middleware('auth');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store')->middleware('auth');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit')->middleware('auth');
Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update')->middleware('auth');
// Route::post('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy')->middleware('auth');
Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::delete('/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

Route::get('/photo', [PhotoController::class, 'index'])->name('photo')->middleware('auth');
Route::post('/photo/store', [PhotoController::class, 'store'])->name('photo.store')->middleware('auth');
Route::post('/photo/update/{id}', [PhotoController::class, 'update'])->name('photo.update')->middleware('auth');
Route::post('/photo/destroy/{id}', [PhotoController::class, 'destroy'])->name('photo.destroy')->middleware('auth');
Route::get('/foto', [PhotoController::class, 'publicIndex'])->name('foto.public');

Route::get('/video', [VideoController::class, 'index'])->name('video')->middleware('auth');
Route::post('/video/store', [VideoController::class, 'store'])->name('video.store')->middleware('auth');
Route::post('/video/update/{id}', [VideoController::class, 'update'])->name('video.update')->middleware('auth');
Route::post('/video/destroy/{id}', [VideoController::class, 'destroy'])->name('video.destroy')->middleware('auth');

// ==========================
// ROUTE UNTUK PUBLIK
// ==========================
Route::get('/literasi-public/{slug}', [AppController::class, 'literasi'])
    ->name('literasi.show');

// ==========================
// ROUTE UNTUK ADMIN (WAJIB LOGIN)
// ==========================
Route::middleware(['auth'])->group(function () {

    // CRUD Literasi
    Route::get('/literasi', [LiterasiContentController::class, 'index'])->name('literasi.index');
    Route::get('/literasi/create', [LiterasiContentController::class, 'create'])->name('literasi.create');
    Route::post('/literasi/store', [LiterasiContentController::class, 'store'])->name('literasi.store');
    Route::get('/literasi/edit/{id}', [LiterasiContentController::class, 'edit'])->name('literasi.edit');
    Route::put('/literasi/update/{id}', [LiterasiContentController::class, 'update'])->name('literasi.update');
    Route::delete('/literasi/destroy/{id}', [LiterasiContentController::class, 'destroy'])->name('literasi.destroy');
});

//profil
Route::view('/profil-tbm', 'tbm-profile')->name('tbm.profile');

Route::get('/katalog-ebook', [EbookController::class, 'katalog'])->name('katalog.ebooks');

