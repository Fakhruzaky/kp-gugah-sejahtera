<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        return view("admin.pages.profile-desa.fasilitas", [
            "fasilitass" => Fasilitas::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'], // Image validation
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('fasilitas', 'public'); // Save in 'storage/app/public/fasilitas'
        }

        Fasilitas::create($data);

        return back()->with('success', 'Data Fasilitas Berhasil Ditambah!');
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:10240'], // Image validation (nullable)
        ]);

        if ($request->hasFile('image')) {
            if ($fasilitas->image) {
                Storage::disk('public')->delete($fasilitas->image);
            }

            $data['image'] = $request->file('image')->store('fasilitas', 'public');
        } else {
            $data['image'] = $fasilitas->image;
        }

        // Update the record with the validated data, including the image field
        $fasilitas->update($data);

        // Redirect back with a success message
        return back()->with('success', 'Data Fasilitas Berhasil Diubah!');
    }


    public function destroy(Fasilitas $fasilitas)
    {
        // Check if the record has an image
        if ($fasilitas->image) {
            // Delete the image from storage
            Storage::disk('public')->delete($fasilitas->image);
        }

        // Delete the record from the database
        $fasilitas->delete();

        return back()->with('success', 'Data Fasilitas Berhasil Dihapus!');
    }
}
