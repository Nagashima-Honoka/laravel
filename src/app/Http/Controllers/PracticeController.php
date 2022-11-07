<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function practice(){
        $practice = 'practice';
        return view('practice.practice', compact('practice'));
    }
}
