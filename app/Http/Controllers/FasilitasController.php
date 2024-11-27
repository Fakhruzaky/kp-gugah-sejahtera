<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasilitas;
use Illuminate\Validation\Rules\File;

class FasilitasController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:fasilitas,title',
            'photo' => ["required", File::image()->max(2048)]
        ]);

        $path = $request->file("photo")->store("images/fasilitas");

        Fasilitas::create([
            ...$data,
            "image_url" => $path
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $fasilitas = Fasilitas::query()->findOrFail($request->id);

        $fasilitas->update($request->except("id"));

        return back();
    }

    public function destroy(Fasilitas $id)
    {
        $id->delete();

        return back();
    }
}
