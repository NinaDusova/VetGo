<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Pet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    public function profile() {
        $user = Auth::user();
        $doctor = null;
        if (!empty($user->id)) {
            $doctor = Doctor::where('user_id', $user->id)->first();
        }

        return view('user.userprofile', compact('user', 'doctor'));
    }

    public function edit() {
        $user = Auth::user();
        $doctor = null;
        if (!empty($user->id)) {
            $doctor = Doctor::where('user_id', $user->id)->first();
        }

        return view('user.edituser', compact('user', 'doctor'));
    }

    public function doctorinfo() {
        return view('doctor.doctorinfo');
    }

    public function page() {
        $userName = null;

        if (Auth::check()) {
            $user = Auth::user();

            if (!empty($user->id)) {
                $doctor = Doctor::where('user_id', $user->id)->first();
            }
            if (!empty($user->name)) {
                $userName = $user->name;
            }
        }
        return view('doctor.doctorpage', compact('userName', 'doctor'));
    }

    public function infoPost(Request $request) {
        $request->validate([
            'license_number' => 'required|string|unique:doctors,license_number',
            'ordination' => 'required|string|max:255',
        ], [
            'license_number.required' => 'The chip field is required.',
            'license_number.digit' => 'The chip must contain only numbers.',
            'license_number.max' => 'The chip must not exceed 6 digits.',
        ]);

        $userData = session('doctor_registration');

        $user = User::create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt($userData['password']),
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'license_number' => $request->license_number,
            'ordination' => $request->ordination,
        ]);

        session()->forget('doctor_registration');
        return redirect()->route('login')->with('success', 'Doctor account created successfully.');
    }

    public function showPets()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }

        $pets = $doctor->pets;

        return view('doctor.petclients', compact('pets', 'doctor'));
    }

    public function showAddPetForm()
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        return view('doctor.addpet', compact('doctor'));
    }

    public function addPet(Request $request)
    {
        $request->validate([
            'chip' => 'required|exists:pets,chip',
        ], [
            'chip.required' => 'The chip field is required.',
            'chip.digit' => 'The chip must contain only numbers.',
            'chip.max' => 'The chip must not exceed 6 digits.',
        ]);

        $doctor = Doctor::where('user_id', Auth::id())->first();

        if (!$doctor) {
            return redirect()->route('home')->with('error', 'You are not authorized to perform this action.');
        }

        $pet = Pet::where('chip', $request->chip)->first();

        if (!$pet) {
            return redirect()->back()->with('error', 'Pet not found.');
        }

        if ($pet->doctor_id) {
            return redirect()->back()->with('error', 'Pet is already assigned to another doctor.');
        }

        $pet->doctor_id = $doctor->id;
        $pet->save();

        return redirect()->route('petclients', compact('doctor'))->with('success', 'Pet added successfully.');
    }

    public function removePet($id)
    {
        $pet = Pet::findOrFail($id);

        $doctor = Doctor::where('user_id', Auth::id())->first();

        if ($pet->doctor_id != $doctor->id) {
            return redirect()->route('petclients')->with('error', 'You are not authorized to remove this pet.');
        }

        $pet->update([
            'doctor_id' => null,
        ]);

        return redirect()->route('petclients', compact('doctor'))->with('success', 'Pet removed successfully.');
    }

    public function editPet($id)
    {
        $pet = Pet::findOrFail($id);

        $doctor = Doctor::where('user_id', Auth::id())->first();

        if ($pet->doctor_id != $doctor->id) {
            return redirect()->route('petclients')->with('error', 'You are not authorized to edit this pet.');
        }

        return view('doctor.editpet', compact('pet', 'doctor'));
    }

    public function updatePet(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);

        $doctor = Doctor::where('user_id', Auth::id())->first();

        if (!$doctor || $pet->doctor_id != $doctor->id) {
            return redirect()->route('petclients')->with('error', 'You are not authorized to edit this pet.');
        }

        $validatedData = $request->validate([
            'species' => 'required|string|max:255',
            'gender' => 'required|in:male,female',
            'birth_day' => 'required|date|before_or_equal:today',
            'neutered' => 'required|boolean',
            'chip' => 'required|string|max:255',
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

        $pet->update($validatedData);

        return redirect()->route('petclients', 'doctor')->with('success', 'Pet updated successfully.');
    }

}
