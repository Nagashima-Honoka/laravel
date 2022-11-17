<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function top(){
        return view('top');
    }

    public function logout(){
        return view('logout');
    }
}
