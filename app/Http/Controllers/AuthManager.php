<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if (!empty($user->id)) {
                $isDoctor = Doctor::where('user_id', $user->id)->exists();
            }

            if ($isDoctor) {
                return redirect()->intended(route('doctorpage'));
            } else {
                return redirect()->intended(route('page'));
            }
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    public function signup()
    {
        return view('user.signup');
    }

    public function signupPost(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users|email:rfc,dns|max:255',
            'password' => 'required'
        ], [
            'email.required' => 'Email address is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'Email address must not exceed 255 characters.',
        ]);

        if ($request->has('is_doctor')) {
            $request->session()->put('doctor_registration', $request->only('name', 'email', 'password'));
            return redirect()->route('doctorinfo');
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);

        if (!$user) {
            return redirect(route('signup') )->with("error", "Registration failed, try again");
        }

        return  redirect(route('login'))->with("success", "Registration success, Login to access the app");
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('home'));
    }
}
