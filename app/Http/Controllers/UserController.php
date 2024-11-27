<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
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
