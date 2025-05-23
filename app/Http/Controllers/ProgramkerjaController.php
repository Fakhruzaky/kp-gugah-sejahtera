<?php

namespace App\Http\Controllers;

use App\Models\Pemerintahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramkerjaController extends Controller
{

    public function index()
    {
        $struktur =  Pemerintahan::where('type', 'struktur')->get();
        $programkerja = Pemerintahan::where('type', 'program')->get();

        return view('admin.pages.pemerintahan-desa.index', [
            'struktur' => $struktur,
            'programkerja' => $programkerja,
        ]);
    }

    public function storeStruktur(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'], // Image validation
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
            'image_url' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif'], // Image validation (nullable)
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


    public function storeProgram(Request $request)
    {

        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        $data['type'] = 'program';

        Pemerintahan::create($data);

        return back()->with('success', 'Data Program Kerja Berhasil Ditambah!');
    }

    public function updateProgram(Request $request, Pemerintahan $program)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],  // Validate description length
        ]);

        // Update the record with the validated data, including the image field
        $program->update($data);

        // Redirect back with a success message
        return back()->with('success', 'Data Program Berhasil Diubah!');
    }

    public function destroy(Pemerintahan $id)
    {
        $id->delete();

        return back();
    }
}
