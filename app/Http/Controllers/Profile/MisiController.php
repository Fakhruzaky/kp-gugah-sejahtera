<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Misi;
use Illuminate\Http\Request;

class MisiController extends Controller
{
    public function index()
    {
        return view("admin.pages.profile-desa.misi", [
            "mision" => Misi::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);

        Misi::create($data);

        return back()->with('success', 'Data Misi Berhasil Ditambah!');
    }

    public function update(Request $request, Misi $misi)
    {
        $data = $request->validate([
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:255'],
        ]);


        Misi::where('id', $misi->id)->update($data);
        return back()->with('success', 'Data Misi Berhasil Diubah!');
    }

    public function destroy(Misi $misi)
    {
        $misi->delete();

        return back();
    }
}
