<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ProfileController extends Controller
{
    //
    public function sejarah ()
    {
        return view('profile.sejarah');
    }
    public function visiMisi ()
    {
        return view('profile.visi-misi');
    }
    public function struktur ()
    {
        return view('profile.so');
    }
}
