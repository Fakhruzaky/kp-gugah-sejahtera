<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        return view("admin.pages.profile-desa.fasilitas", [
            "fasilitass" => Fasilitas::all()
        ]);
    }

    public function destroy(Fasilitas $id)
    {
        $id->delete();

        return back();
    }
}
