<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userprofile()
    {
        $user = Auth::user();

        return view('user.userprofile', compact('user'));
    }

    public function page()
    {
        return view('user.page');
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
           'email' => 'required|email|max:255',
           'phone_number' => 'nullable|string|max:255',
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
}
