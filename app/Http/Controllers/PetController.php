<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PetController extends Controller
{
    public function pets()
    {
        return view('pet.pets');
    }

    public function investigations()
    {
        return view('pet.investigations');
    }

    public function petprofile()
    {
        return view('pet.petprofile');
    }

    public function petedit()
    {
        return view('pet.petedit');
    }
}
