<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function userprofile()
    {
        $user = Auth::user();

        return view('user.userprofile', compact('user'));
    }

    public function page()
    {
        if (!empty(Auth::user()->name)) {
            $userName = Auth::user()->name;
        }
        return view('user.page',  compact('userName'));
    }

    public function edituser()
    {
        $user = Auth::user();
        return view('user.edituser', compact('user'));
    }

    public function updateuser(Request $request)
    {
        $user = Auth::user();

        $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|email:rfc,dns|max:255',
            'phone_number' => ['nullable', 'regex:/^\+?[0-9]{7,15}$/'],
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address must not exceed 255 characters.',
            'phone_number.regex' => 'Phone number must contain only numbers and may start with "+".',
        ]);

        $user-> update([
            'name' => $request->input('name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('userprofile')->with('success', 'Infos were successfully updated!');
    }

    public function deleteuser() {
        $user = Auth::user();
        $user->delete();
        return redirect()->route('home')->with('success', 'Account was deleted');
    }

    public function uploadphoto(Request $request) {

        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->hasFile('photo')) {
            if (!empty($user->photo)) {
               // if ($user->photo) Storage::disk('public')->delete($user->photo);
                Storage::disk('public')->delete($user->photo);
            }

            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
            $user->save();
        }
        return redirect()->back()->with('success', 'Photo updated successfully.');
    }
}
