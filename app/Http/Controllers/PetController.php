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
        $user = Auth::user();

        if (!empty($user->pets)) {
            $pets = $user->pets;
        }

        return view('pet.investigations', ['pets' => $pets]);
    }

    public function petprofile()
    {
        return view('pet.petprofile');
    }

    public function petedit($id = null)
    {
        $pet = $id ? Pet::find($id) : null;
        return view('pet.petedit', compact('pet'));
    }

    public function savepet(Request $request)
    {
        $request->validate( [
            'species' => 'required|string|max:255',
            'birth_day' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:male,female',
            'neutered' => 'required|boolean',
            'chip' => 'required|string|digit:6|max:6',
            'breed' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
        ], [
            'birth_day.required' => 'The birth date is required.',
            'birth_day.date' => 'Please enter a valid date.',
            'birth_day.before_or_equal' => 'The birth date cannot be in the future.',
            'chip.required' => 'The chip field is required.',
            'chip.digit' => 'The chip must contain only numbers.',
            'chip.max' => 'The chip must not exceed 6 digits.',
            'weight.required' => 'Weight is required.',
            'weight.numeric' => 'Weight must be a valid number.',
            'weight.min' => 'Weight cannot be negative.',
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

        return redirect()->route('petprofile', $pet->id);
    }

    public function petupdate(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);

        $validatedData = $request->validate( [
            'species' => 'required|string|max:255',
            'birth_day' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:male,female',
            'neutered' => 'required|boolean',
            'chip' => 'required|string|digits:6|max:6',
            'breed' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
        ], [
            'birth_day.required' => 'The birth date is required.',
            'birth_day.date' => 'Please enter a valid date.',
            'birth_day.before_or_equal' => 'The birth date cannot be in the future.',
            'chip.required' => 'The chip field is required.',
            'chip.digits' => 'The chip must contain 6 digits and only numbers.',
            'chip.max' => 'The chip must not exceed 6 digits.',
            'weight.required' => 'Weight is required.',
            'weight.numeric' => 'Weight must be a valid number.',
            'weight.min' => 'Weight cannot be negative.',
        ]);

        $pet->species = $validatedData['species'];
        $pet->gender = $validatedData['gender'];
        $pet->birth_day = $validatedData['birth_day'];
        $pet->neutered = $validatedData['neutered'];
        $pet->chip = $validatedData['chip'];
        $pet->breed = $validatedData['breed'];
        $pet->weight = $validatedData['weight'];

        $pet->save();

        return redirect()->route('petprofile', $pet->id)->with('success', 'Pet profile updated successfully!');
    }
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pet.petprofile', compact('pet'));
    }

    public function deletepet($id) {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect()->route('pets')->with('success', 'Pet deleted successfully!');
    }

}
