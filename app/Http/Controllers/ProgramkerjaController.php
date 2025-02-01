<?php

namespace App\Http\Controllers;

use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramkerjaController extends Controller
{

    public function storeStruktur(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation
        ]);

        $data['type'] = 'struktur';

        // Handle image upload
        if ($request->hasFile('image_url')) {
            $data['image_url'] = $request->file('image_url')->store('struktur', 'public');
        }


        Pemerintahan::create($data);

        return back()->with('success', 'Data Struktur Berhasil Ditambah!');
    }

    public function updateStruktur(Request $request, Pemerintahan $pemerintahan)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],  // Validate description length
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // Image validation (nullable)
        ]);

        if ($request->hasFile('image_url')) {
            if ($pemerintahan->image_url) {
                Storage::disk('public')->delete($pemerintahan->image_url);
            }

            $data['image_url'] = $request->file('image_url')->store('struktur', 'public');
        } else {
            $data['image_url'] = $pemerintahan->image;
        }

        // Update the record with the validated data, including the image field
        $pemerintahan->update($data);

        // Redirect back with a success message
        return back()->with('success', 'Data Struktur Berhasil Diubah!');
    }

    public function destroyStruktur(Pemerintahan $pemerintahan)
    {
        // Check if the record has an image
        if ($pemerintahan->image_url) {
            // Delete the image from storage
            Storage::disk('public')->delete($pemerintahan->image_url);
        }

        // Delete the record from the database
        $pemerintahan->delete();

        return back()->with('success', 'Data Struktur Berhasil Dihapus!');
    }



    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Pemerintahan::create([
            ...$data,
            'type' => 'program',
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $programkerja = Pemerintahan::query()->findOrFail($request->id);

        $programkerja->update($request->except('id'));

        return back();
    }

    public function destroy(Pemerintahan $id)
    {
        $id->delete();

        return back();
    }
}
