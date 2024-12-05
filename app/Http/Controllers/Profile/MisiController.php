<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Misi;

class MisiController extends Controller
{
    public function index()
    {
        return view("admin.pages.profile-desa.misi", [
            "mision" => Misi::all()
        ]);
    }

    public function destroy(Misi $misi)
    {
        $misi->delete();

        return back();
    }
}
