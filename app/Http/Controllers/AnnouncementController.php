<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {
        return view("guest.pages.publikasi.pengumuman.index", [
            "announcements" => Announcement::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|string|max:255",
            "content" => "required|string",
            "image" => "nullable|image"
        ]);

        Announcement::create($data);

        return back()->with('success', 'Berhasil menambahkan pengumuman');
    }

    public function show(Announcement $announcement)
    {
        return view("guest.pages.publikasi.pengumuman.show", [
            "announcement" => $announcement
        ]);
    }

    public function destroy(Announcement $announcement)
    {
        $announcement->delete();

        return back()->with('success', 'Berhasil menghapus pengumuman');
    }
}
