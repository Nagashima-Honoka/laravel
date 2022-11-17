<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(){
        $test = 'test';
        $test1 = 'test1';
        return view('sample', compact('test', 'test1' ));
    }

    public function contact(){
        $contact = 'contact';
        $contact1 = 'contact1';
        return view('contact', compact('contact', 'contact1' ));
    }

    public function confirm(){
        return view('confirm');
    }

    public function complete(){
        return view('complete');
    }

}
