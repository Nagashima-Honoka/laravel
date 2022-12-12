<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // eachによるコレクションビュー
    // data変数を用意しておく
    public function index() {
        $data = [
            ['name'=>'山田たろう', 'mail'=>'taro@yamada'],
            ['name'=>'田中はなこ', 'mail'=>'hanako@flower'],
            ['name'=>'鈴木さちこ', 'mail'=>'sachico@happy'],
        ];
        return view('hello.index', ['data'=>$data]);
    }


}
