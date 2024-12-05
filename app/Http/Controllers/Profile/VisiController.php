<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Visi;

class VisiController extends Controller
{
    public function index()
    {
        return view('admin.pages.profile-desa.visi', [
            "vision" => Visi::all()
        ]);
    }

    public function destroy(Visi $visi)
    {
        $visi->delete();

        return back();
    }
}
