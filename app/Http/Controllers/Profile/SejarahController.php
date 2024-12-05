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
        Sejarah::create($request->all());

        return back();
    }

    public function update(Request $request, Sejarah $sejarah)
    {
        $sejarah->update($request->all());

        return back();
    }
}
