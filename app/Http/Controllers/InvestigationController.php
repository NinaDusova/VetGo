<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Investigation;
use App\Models\Pet;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestigationController extends Controller
{
    public function create(): Factory|View|Application
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $pets = Pet::where('doctor_id', $doctor->id)->get();

        return view('doctor.add_investigation', compact('pets', 'doctor'));
    }

    public function store(Request $request)
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $validated = $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'date' => 'required|date|before_or_equal:today',
            'description' => 'required|string|max:255',
        ], [
            'pet.required' => 'The pet is required.',
            'date.required' => 'The birth date is required.',
            'date.date' => 'Please enter a valid date.',
            'date.before_or_equal' => 'The birth date cannot be in the future.',
            'description.required' => 'The chip field is required.',
            'description.max' => 'The description must not exceed 255 characters.',
        ]);

        Investigation::create([
            'pet_id' => $validated['pet_id'],
            'doctor_id' => $doctor->id,
            'date' => $validated['date'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('doctor.investigations', compact('doctor'))->with('success', 'Investigation added successfully!');
    }

    public function edit($id)
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $investigation = Investigation::findOrFail($id);
        return view('doctor.edit_investigation', compact('investigation',  'doctor'));
    }

    public function destroy($id)
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();
        $investigation = Investigation::findOrFail($id);
        $investigation->delete();

        return redirect()->route('doctor.investigations', compact('doctor'))->with('success', 'Investigation deleted successfully.');
    }

    public function update(Request $request, $id)
    {
        $doctor = Doctor::where('user_id', Auth::id())->first();

        $request->validate([
            'date' => 'required|date|before_or_equal:today',
            'description' => 'required|string|max:500',
        ], [
            'date.required' => 'The birth date is required.',
            'date.date' => 'Please enter a valid date.',
            'date.before_or_equal' => 'The birth date cannot be in the future.',
            'description.required' => 'The chip field is required.',
            'description.max' => 'The description must not exceed 255 characters.',
        ]);

        $investigation = Investigation::findOrFail($id);
        $investigation->update([
            'date' => $request->input('date'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('doctor.investigations', compact('doctor'))->with('success', 'Investigation updated successfully.');
    }
}
