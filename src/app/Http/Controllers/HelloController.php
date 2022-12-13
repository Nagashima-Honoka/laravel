<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // eachによるコレクションビュー
    // data変数を用意しておく
    public function index() {
     return view('hello.index', ['message'=>'Hello!']);
    }


}
