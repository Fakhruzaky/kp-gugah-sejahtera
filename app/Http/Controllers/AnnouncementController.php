<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view('guest.pages.publikasi.pengumuman.index', [
            'announcements' => Announcement::all(),
        ]);
    }

    public function store(Request $request)
    {
        $path = null;

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('image/pengumuman');
        }

        Announcement::create([
            "title" => $data['title'],
            'description' => $data['description'],
            'image_url' => $path
        ]);

        return back()->with('success', 'Berhasil menambahkan pengumuman');
    }

    public function show(Announcement $announcement)
    {
        return view('guest.pages.publikasi.pengumuman.show', [
            'announcement' => $announcement,
        ]);
    }

    public function update(Request $request)
    {
        $path = null;
        $announcement = Announcement::findOrFail($request->id);

        if($request->hasFile('image')) {
            $oldpath = $announcement->image_url;
            $path = $request->file('image')->store('images/pengumuman');

            Storage::delete($oldpath);
        }

        $announcement->update([
            "title" => $request->title,
            "content" => $request->description,
            "image_url" => $path
        ]);

        return back();
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with('success', 'Berhasil menghapus pengumuman');
    }
}
