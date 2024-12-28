<?php

namespace App\Http\Controllers;

use App\Models\Investigation;
use App\Models\Pet;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    public function pets(): Factory|View|Application
    {
        $user = Auth::user();

        if (!empty($user->pets)) {
            $pets = $user->pets;
            return view('pet.pets', ['pets' => $pets]);
        }
        return redirect('page');
    }

    public function investigations(): Factory|View|Application
    {
       /* $user = Auth::user();

        if (!empty($user->pets)) {
            $pets = $user->pets;
            return view('pet.investigations', ['pets' => $pets]);
        }
        return redirect('page');*/
        $user = auth()->user();

        $pets = Pet::with('investigations')
            ->where('user_id', $user->id)
            ->get();

        $investigations = Investigation::with(['doctor.user'])
            ->whereIn('pet_id', $pets->pluck('id'))
            ->get();

        return view('pet.investigations', compact('pets', 'investigations'));

    }

    public function petprofile(): Factory|View|Application
    {
        return view('pet.petprofile');
    }

    public function petedit($id = null): Factory|View|Application
    {
        $pet = $id ? Pet::find($id) : null;
        return view('pet.petedit', compact('pet'));
    }

    public function savepet(Request $request): RedirectResponse
    {
        $request->validate( [
            'name' =>'required|string|max:255',
            'species' => 'required|string|max:255',
            'birth_day' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:male,female',
            'neutered' => 'required|boolean',
            'chip' => 'required|string|digits:6|max:6',
            'breed' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
        ], [
            'name.required' => 'The name is required.',
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
        $pet->name = $request->name;
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

        $tempPhotoPath = session('temp_photo');
        $finalPath = str_replace('temp/', 'pets/', $tempPhotoPath);
        Storage::disk('public')->move($tempPhotoPath, $finalPath);
        $pet->photo = $finalPath;
        $pet->save();

        session()->forget('temp_photo');

        return redirect()->route('petprofile', $pet->id);
    }

    public function petupdate(Request $request, $id): RedirectResponse
    {
        $pet = Pet::findOrFail($id);

        $validatedData = $request->validate( [
            'name' =>'required|string|max:255',
            'species' => 'required|string|max:255',
            'birth_day' => 'required|date|before_or_equal:today',
            'gender' => 'required|in:male,female',
            'neutered' => 'required|boolean',
            'chip' => 'required|string|digits:6|max:6',
            'breed' => 'required|string|max:255',
            'weight' => 'required|numeric|min:0',
        ], [
            'name.required' => 'The name is required.',
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

        $pet->name = $validatedData['name'];
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

    public function uploadTempPhoto(Request $request): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $filePath = $request->file('photo')->store('temp', 'public');
            session(['temp_photo' => $filePath]);

            return redirect()->back()->with('success', 'Photo uploaded successfully.');
        }

        return redirect()->back()->withErrors(['photo' => 'Photo upload failed.']);
    }

    public function show($id): Factory|View|Application
    {
        $pet = Pet::findOrFail($id);
        return view('pet.petprofile', compact('pet'));
    }

    public function deletepet($id): RedirectResponse
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect()->route('pets')->with('success', 'Pet deleted successfully!');
    }

    public function uploadphotopet(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $pet = Pet::findOrFail($id);

            if (!empty($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            $path = $request->file('photo')->store('photos', 'public');
            $pet->photo = $path;
            $pet->save();

            return redirect()->route('petedit', $pet->id)->with('success', 'Pet profile updated successfully!');
        }
        return redirect()->route('page');
    }
}
