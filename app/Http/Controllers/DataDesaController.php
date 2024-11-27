<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataDesa;

class DataDesaController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|unique:profiles,title',
            'description' => 'required'
        ]);

        DataDesa::create([
            ...$data,
            'type' => 'datadesa'
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $datadesa = DataDesa::query()->findOrFail($request->id);

        $datadesa->update($request->except("id"));

        return back();
    }

    public function destroy(DataDesa $id)
    {
        $id->delete();

        return back();
    }
}
