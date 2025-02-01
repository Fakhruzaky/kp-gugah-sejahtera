<?php

namespace App\Http\Controllers;

use App\Models\DataDesa;
use Illuminate\Http\Request;

class DataDesaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:profiles,title',
            'description' => 'required',
        ]);

        DataDesa::create([
            ...$data,
            'type' => 'datadesa',
        ]);

        return back();
    }

    public function update(Request $request, DataDesa $dataDesa)
    {
        $data = $request->validate([
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],  // Validate description length
        ]);

        // Update the record with the validated data, including the image field
        $dataDesa->update($data);

        // Redirect back with a success message
        return back()->with('success', 'Data Program Berhasil Diubah!');
    }

    public function destroy(DataDesa $id)
    {
        $id->delete();

        return back();
    }
}
