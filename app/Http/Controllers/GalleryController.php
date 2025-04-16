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
            'title' => ['required', 'max:255'],

            'image_url' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'], // Image validation
        ]);

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('galeri', 'public');
        }

        Gallery::create($data);

        return back()->with('success', 'Berhasil menambahkan pengumuman');
    }

    public function update(Request $request, Gallery $galeri)
    {

        $data = $request->validate([
            'title' => ['required', 'max:255'],
            // Validate description length
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'], // Image validation (nullable)
        ]);

        if ($request->hasFile('image_url')) {
            if ($galeri->image_url) {
                Storage::dis('public')->delete($galeri->image_url);
            }

            $data['image_url'] = $request->file('image_url')->store('galeri', 'public');
        } else {
            $data['image_url'] = $galeri->image_url;
        }

        // Update the record with the validated data, including the image field
        $galeri->update($data);

        // Redirect back with a success message
        return back()->with('success', 'Data pengumuman Berhasil Diubah!');
    }

    public function destroy(Gallery $galeri)
    {
        // Check if the record has an image
        if ($galeri->image) {
            // Delete the image from storage
            Storage::disk('public')->delete($galeri->image);
        }

        // Delete the record from the database
        $galeri->delete();

        return back()->with('success', 'Data Fasilitas Berhasil Dihapus!');
    }
}
