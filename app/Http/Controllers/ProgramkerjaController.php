<?php

namespace App\Http\Controllers;

use App\Models\Pemerintahan;
use Illuminate\Http\Request;

class ProgramkerjaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:pemerintahans,name',
            'description' => 'required'
        ]);

        Pemerintahan::create([
            ...$data,
            'type' => 'program'
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $programkerja = Pemerintahan::query()->findOrFail($request->id);

        $programkerja->update($request->except("id"));

        return back();
    }

    public function destroy(Pemerintahan $id)
    {
        $id->delete();

        return back();
    }
}
