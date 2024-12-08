<?php

use App\Models\Gallery;
use App\Models\Profile;
use App\Models\DataDesa;
use App\Models\Fasilitas;
use App\Models\Announcement;
use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Profile\MisiController;
use App\Http\Controllers\Profile\VisiController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DataDesaController;
use App\Http\Controllers\Profile\FasilitasController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ProgramkerjaController;
use App\Http\Controllers\Profile\SejarahController;
use App\Models\Misi;
use App\Models\Sejarah;
use App\Models\Visi;

Route::middleware("guest")->group(function () {
    Route::get("/", fn() => view("guest.pages.beranda.index", ["announcements" => Announcement::latest()->take(3)->get()]))->name("beranda");

    Route::prefix("/profile")->group(function () {
        Route::get("/sejarah", fn() => view("guest.pages.profile.sejarah.index", ["sejarah" => Sejarah::first()]))->name("guest.profile.sejarah");
        Route::get("/visi-misi", fn() => view('guest.pages.profile.visi-misi.index', [
            'visi' => Visi::all(),
            'misi' => Misi::all()
        ]))->name('guest.profile.visi-misi');
        Route::get('/fasilitas', fn() => view("guest.pages.profile.fasilitas.index", [
            'fasilitass' => Fasilitas::all()
        ]))->name('guest.profile.fasilitas');
    });

    Route::get('/login', fn() => view('guest.pages.login.index'))->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});


Route::middleware('guest')->group(function () {
    Route::get('/pemerintahan-desa/struktur', function () {
        return view('guest.pages.profile.fasilitas.index');
    })->name('guest.profile.fasilitas');

    Route::get('/pemerintahan-desa/struktur', function () {
        return view('guest.pages.pemerintahan-desa.struktur.index', [
            'image' => Pemerintahan::whereNotNull('image_url')->get(),
        ]);
    })->name('guest.pemerintahan-desa.struktur');

    Route::get('/pemerintahan-desa/program-kerja', function () {
        return view('guest.pages.pemerintahan-desa.program-kerja.index', [
            'progjas' => Pemerintahan::where('type', 'program')->get()
        ]);
    })->name('guest.pemerintahan-desa.program-kerja');

    Route::get('/data-desa', function () {
        return view('guest.pages.data-desa.index', [
            'datadesa' => DataDesa::all()
        ]);
    })->name('guest.data-desa');
});

Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth');
Route::get('admin/beranda', function () {
    return view('admin.pages.beranda.index',);
})->name('admin.dashboard.beranda')->middleware('auth');

Route::get('admin/profile-desa', function () {
    return view('admin.pages.profile-desa.index', [
        'sejarah' => Profile::where('type', 'sejarah')->get(),
        'visi' => Profile::where('type', 'visi')->get(),
        'misi' => Profile::where('type', 'misi')->get(),
        'fasilitas' => Fasilitas::all(),
    ]);
})->name('admin.dashboard.profile-desa')->middleware('auth');

Route::middleware("auth")->group(function () {
    Route::prefix("/admin")->group(function () {
        Route::prefix("/profile-desa")->group(function () {
            Route::get("/sejarah", [SejarahController::class, "index"])->name("sejarah");
            Route::post("/sejarah", [SejarahController::class, "store"])->name("store sejarah");
            Route::put("/sejarah/{sejarah}", [SejarahController::class, "update"])->name("update sejarah");

            Route::get("/visi", [VisiController::class, "index"])->name("visi");
            Route::delete("/visi/{visi}", [VisiController::class, "destroy"])->name("hapus visi");

            Route::get("/misi", [MisiController::class, "index"])->name("misi");
            Route::delete("/misi/{misi}", [MisiController::class, "destroy"])->name("hapus misi");

            Route::get("/fasilitas", [FasilitasController::class, "index"])->name("fasilitas");
        });
    });
});


Route::get('admin/pemerintahan-desa', function () {
    return view('admin.pages.pemerintahan-desa.index', [
        'struktur' => Pemerintahan::where('type', 'struktur')->get(),
        'programkerja' => Pemerintahan::where('type', 'program')->get(),
    ]);
})->name('admin.dashboard.pemerintahan-desa')->middleware('auth');

Route::get('admin/data-desa', function () {
    return view('admin.pages.data-desa.index', [
        'datadesa' => DataDesa::all(),
    ]);
})->name('admin.dashboard.data-desa')->middleware('auth');

Route::get('admin/publikasi', function () {
    return view('admin.pages.publikasi.index', [
        'announcements' => Announcement::all(),
        'galleries' => Gallery::all(),
    ]);
})->name('admin.dashboard.publikasi')->middleware('auth');

Route::post('admin/addvisi', [VisiController::class, 'store'])->name('savevisi')->middleware('auth');
Route::put('/vision/edit', [VisiController::class, 'update'])->name('update visi')->middleware('auth');

Route::post('admin/addmisi', [MisiController::class, 'store'])->name('savemisi')->middleware('auth');
Route::put('/mission/edit', [MisiController::class, 'update'])->name('update misi')->middleware('auth');

Route::post('admin/tambahstruktur', function (Request $request) {
    $path = $request->file('photo')->store('/images');

    Pemerintahan::create([
        'type' => 'struktur',
        'description' => 'strukturpemerintahan',
        'name' => 'fotostruktur',
        'image_url' => $path,
    ]);

    return back();
})->middleware('auth');

Route::put('admin/editstruktur', function (Request $request) {
    $struktur = Pemerintahan::where('type', 'struktur')->first();
    Storage::delete($struktur->image_url);

    $path = $request->file('photo')->store('images');
    $struktur->update([
        'image_url' => $path,
    ]);

    return back();
})->middleware('auth');

Route::post('admin/addprogram', function (Request $request) {
    Pemerintahan::create([
        'type' => 'programkerja',
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return back();
})->middleware('auth');

Route::post('admin/tambahfasilitas', [FasilitasController::class, 'store'])->name('savefasilitas');

Route::put('admin/editfasilitas', function (Request $request) {
    $fasilitas = Profile::where('type', 'fasilitas')->first();
    Storage::delete($fasilitas->image_url);

    $path = $request->file('photo')->store('images');
    $fasilitas->update([
        'image_url' => $path,
    ]);

    return back();
})->middleware('auth');

Route::delete('/hapus-fasilitas/{id}', [FasilitasController::class, 'destroy'])->name('hapus fasilitas')->middleware('auth');

Route::post('admin/saveprogram', [ProgramkerjaController::class, 'store'])->name('saveprogram')->middleware('auth');
Route::put('/program/edit', [ProgramkerjaController::class, 'update'])->name('update programkerja')->middleware('auth');
Route::delete('/hapus-program/{id}', [ProgramkerjaController::class, 'destroy'])->name('hapus program')->middleware('auth');

Route::post('admin/savedata', [DataDesaController::class, 'store'])->name('savedata')->middleware('auth');
Route::put('/data/edit', [DataDesaController::class, 'update'])->name('update data')->middleware('auth');
Route::delete('/hapus-data/{id}', [DataDesaController::class, 'destroy'])->name('hapus data')->middleware('auth');

Route::middleware('guest')->group(function () {
    // * Pengumuman
    Route::get('/publikasi/pengumuman', [AnnouncementController::class, 'index'])->name('guest.publikasi.pengumuman');
    Route::get('/pengumuman/{announcement}', [AnnouncementController::class, 'show'])->name('lihat pengumuman');

    // * Gallery
    Route::get('/publikasi/galeri', [GalleryController::class, 'index'])->name('guest.publikasi.galeri');
});

Route::middleware('auth')->group(function () {
    // * Pengumuman
    Route::post('/pengumuman', [AnnouncementController::class, 'store'])->name('tambah pengumuman');
    Route::put('/pengumuman', [AnnouncementController::class, 'update'])->name('edit pengumuman');
    Route::delete('/pengumuman/{announcement}', [AnnouncementController::class, 'destroy'])->name('hapus pengumuman');

    // * Gallery
    Route::post('/gallery', [GalleryController::class, 'store'])->name('tambah gallery');
    Route::put('/gallery', [GalleryController::class, 'update'])->name('edit gallery');
    Route::delete('/gallery/{gallery}', [GalleryController::class, 'destroy'])->name('hapus gallery');
});
