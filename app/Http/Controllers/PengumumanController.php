<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:pengumuman,title',
            'description' => 'required'
        ]);

        Pengumuman::create([
            ...$data,
            'type' => 'pengumuman'
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $pengumuman = Pengumuman::query()->findOrFail($request->id);

        $pengumuman->update($request->except("id"));

        return back();
    }

    public function destroy(Pengumuman $id)
    {
        $id->delete();

        return back();
    }
}
