<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function viewHomePage()
    {
        return view('home');
    }

    public function viewUserPage()
    {
        // COMMENT: Redirect to login page if the user is not authenticated
        if (is_null(Auth::user())) {
            return redirect()->route('viewLoginPage');
        }

        return view('user', ['name' => Auth::user()->name]);
    }

    public function viewLoginPage()
    {
        return view('login');
    }

    public function viewRegisterPage()
    {
        return view('register');
    }
}
