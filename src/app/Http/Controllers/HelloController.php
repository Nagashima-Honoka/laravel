<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index(Request $request) {
        return view('hello.index', ['msg'=>'フォームを入力:']); // msgという値を用意してviewを呼び出すだけ
    }

    public function post(Request $request) {
        $validate_rule = [
            'name' => 'required',
            'mail'=> 'email',
            'age'=>'numeric|between:0,150', // 値が数値である | 0~150である
        ];
        $this->validate($request, $validate_rule); // validationの実行
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }

}
