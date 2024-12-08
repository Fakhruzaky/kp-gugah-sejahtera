<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        return view('guest.pages.publikasi.galeri.index', [
            'galleries' => Gallery::all(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image',
        ]);

        $path = $request->file('image')->store('gallery');

        Gallery::query()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'image_url' => $path,
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $path = null;
        $gallery = Gallery::findOrFail($request->id);

        if ($request->hasFile('image')) {
            $oldpath = $gallery->image_url;
            $path = $request->file('image')->store('images/galleries');

            Storage::delete($oldpath);
        }

        $gallery->update([
            "title" => $request->title,
            "content" => $request->description,
            "image_url" => $path
        ]);

        return back();
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return back()->with('success', 'Berhasil menghapus foto');
    }
}
