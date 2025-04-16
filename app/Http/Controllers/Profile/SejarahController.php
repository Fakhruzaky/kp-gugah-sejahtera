<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile-desa.sejarah', [
            'sejarah' => Sejarah::first()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
        ]);

        Sejarah::create($request->all());

        return back();
    }

    public function update(Request $request, Sejarah $sejarah)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $sejarah->update($request->all());

        return back();
    }
}
