<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetController extends Controller
{
    public function pets()
    {
        $user = Auth::user();

        if (!empty($user->pets)) {
            $pets = $user->pets;
        }
        return view('pet.pets', ['pets' => $pets]);
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

    public function savepet(Request $request)
    {
        $request->validate([
            'species' => 'required|string|max:255',
            'birth_day' => 'required|date',
            'gender' => 'required|in:male,female',
            'neutered' => 'required|boolean',
            'chip' => 'required|string|max:255',
            'breed' => 'required|string|max:255',
            'weight' => 'required|numeric',
        ]);

        $pet = new Pet();
        $pet->species = $request->species;
        $pet->birth_day = $request->birth_day;
        $pet->gender = $request->gender;
        $pet->neutered = $request->neutered;
        $pet->chip = $request->chip;
        $pet->breed = $request->breed;
        $pet->weight = $request->weight;
        if (!empty(Auth::user()->id)) {
            $pet->user_id = Auth::user()->id;
        }
        $pet->save();

        return view('pet.petprofile');
    }

    public function tempedit()
    {
        return view('pet.tempedit');
    }


}
