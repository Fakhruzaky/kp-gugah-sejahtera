<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('guest.pages.publikasi.pengumuman.index', [
            'announcements' => Announcement::all(),
        ]);
    }

    public function show(Announcement $announcement)
    {
        return view('guest.pages.publikasi.pengumuman.show', [
            'announcement' => $announcement,
        ]);
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('pengumuman', 'public');
        }

        $data['slug'] = Str::slug($data['title']);

        Announcement::create($data);

        return back()->with('success', 'Berhasil menambahkan pengumuman');
    }

    public function update(Request $request, Announcement $pengumuman)
    {

        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],  // Validate description length
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation (nullable)
        ]);

        if ($request->hasFile('image_url')) {
            if ($pengumuman->image_url) {
                Storage::disk('public')->delete($pengumuman->image_url);
            }

            $data['image_url'] = $request->file('image_url')->store('pengumuman', 'public');
        } else {
            $data['image_url'] = $pengumuman->image_url;
        }

        $data['slug'] = Str::slug($data['title']);


        // Update the record with the validated data, including the image field
        $pengumuman->update($data);

        // Redirect back with a success message
        return back()->with('success', 'Data pengumuman Berhasil Diubah!');
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with('success', 'Berhasil menghapus pengumuman');
    }
}
