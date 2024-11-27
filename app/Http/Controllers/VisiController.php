<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class VisiController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:profiles,title',
            'description' => 'required'
        ]);

        Profile::create([
            ...$data,
            'type' => 'visi'
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $visi = Profile::query()->findOrFail($request->id);

        $visi->update($request->except("id"));

        return back();
    }

    public function destroy(Profile $id)
    {
        $id->delete();

        return back();
    }
}
