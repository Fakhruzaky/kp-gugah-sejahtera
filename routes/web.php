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
    return view('admin.pages.beranda.index', [
        'datadesa' => DataDesa::all()
    ]);
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
            Route::post("/visi/store", [VisiController::class, "store"])->name("visi.store");
            Route::put("/visi/{visi}/update", [VisiController::class, "update"])->name("visi.update");
            Route::delete("/visi/{visi}", [VisiController::class, "destroy"])->name("hapus visi");


            Route::get("/misi", [MisiController::class, "index"])->name("misi");
            Route::post("/misi/store", [MisiController::class, "store"])->name("misi.store");
            Route::put("/misi/{misi}/update", [MisiController::class, "update"])->name("misi.update");
            Route::delete("/misi/{misi}", [MisiController::class, "destroy"])->name("hapus misi");

            Route::get("/fasilitas", [FasilitasController::class, "index"])->name("fasilitas");
            Route::post("/fasilitas/store", [FasilitasController::class, "store"])->name("fasilitas.store");
            Route::put("/fasilitas/{fasilitas}/update", [FasilitasController::class, "update"])->name("fasilitas.update");
            Route::delete('/fasilitas/{fasilitas}/delete', [FasilitasController::class, 'destroy'])->name('fasilitas.delete');
        });
    });
});

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



Route::post('admin/addmisi', [MisiController::class, 'store'])->name('savemisi')->middleware('auth');
Route::put('/mission/edit', [MisiController::class, 'update'])->name('update misi')->middleware('auth');


Route::get('admin/pemerintahan-desa', [ProgramkerjaController::class, 'index'])->name('admin.dashboard.pemerintahan-desa')->middleware('auth');
Route::post('admin/tambahstruktur', [ProgramkerjaController::class, 'storeStruktur'])->name('struktur.store')->middleware('auth');
Route::put("admin/pemerintahan/{pemerintahan}/update", [ProgramkerjaController::class, "updateStruktur"])->name("struktur.update")->middleware('auth');
Route::delete('/pemerintahan/{pemerintahan}/delete', [ProgramkerjaController::class, 'destroyStruktur'])->name('struktur.delete');


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

Route::post('admin/saveprogram', [ProgramkerjaController::class, 'storeProgram'])->name('program.store')->middleware('auth');
Route::put("/program/{program}/update", [ProgramkerjaController::class, "updateProgram"])->name("program.update");
Route::delete('/hapus-program/{id}', [ProgramkerjaController::class, 'destroy'])->name('hapus program')->middleware('auth');

Route::post('admin/savedata', [DataDesaController::class, 'store'])->name('savedata')->middleware('auth');
Route::put('/data/{dataDesa}/update', [DataDesaController::class, 'update'])->name('update data')->middleware('auth');
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
    Route::put('/pengumuman/{pengumuman:id}/update', [AnnouncementController::class, 'update'])->name('pengumuman.update');
    Route::delete('/pengumuman/{announcement}', [AnnouncementController::class, 'destroy'])->name('hapus pengumuman');

    // * Gallery
    Route::post('/gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::put('/gallery/{galeri}/update', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/{galeri}/delete', [GalleryController::class, 'destroy'])->name('gallery.delete');
});
