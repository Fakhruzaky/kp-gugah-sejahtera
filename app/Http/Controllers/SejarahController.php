<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class SejarahController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:profiles,title',
            'description' => 'required',
        ]);

        Profile::create([
            ...$data,
            'type' => 'sejarah',
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $sejarah = Profile::query()->findOrFail($request->id);

        $sejarah->update($request->except('id'));

        return back();
    }

    public function destroy(Profile $id)
    {
        $id->delete();

        return back();
    }
}
