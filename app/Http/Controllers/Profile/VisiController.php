<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Visi;
use Illuminate\Http\Request;

class VisiController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile-desa.visi', [
            "vision" => Visi::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => ['required', 'max:255'],
        ]);

        Visi::create($data);

        return back()->with('success', 'Data Visi Berhasil Ditambah!');
    }

    public function update(Request $request, Visi $visi)
    {
        $data = $request->validate([
            'description' => ['required', 'max:255'],
        ]);


        Visi::where('id', $visi->id)->update($data);
        return back()->with('success', 'Data Visi Berhasil Diubah!');
    }

    public function destroy(Visi $visi)
    {
        $visi->delete();

        return back();
    }
}
