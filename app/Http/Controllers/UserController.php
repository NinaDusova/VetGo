<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function signup()
    {
        return view('user.signup');
    }

    public function userprofile()
    {
        return view('user.userprofile');
    }

    public function page()
    {
        return view('user.page');
    }

    public function edituser()
    {
        return view('user.edituser');
    }
}
