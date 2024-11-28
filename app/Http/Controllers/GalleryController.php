<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        return view("guest.pages.publikasi.galeri.index", [
            "galleries" => Gallery::all()
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string|max:255",
            "image" => "required|image"
        ]);

        $path = $request->file('image')->store('gallery');

        Gallery::query()->create([
            "title" => $data["title"],
            "image_url" => $path
        ]);

        return back();
    }
}
