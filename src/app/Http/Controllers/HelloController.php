<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HelloController extends Controller
{
    public function index(Request $request) {
        $validator = Validator::make($request->query(), [
            'id' => 'required',
            'pass' => 'required',
        ]);
        if($validator->fails()) {
            $msg = 'クエリーに問題があります。';
        } else {
            $msg = 'ID/PASSを受け付けました。フォームを入力ください。';
         }
        return view('hello.index', ['msg'=>'$msg, ']);
    }

    public function post(Request $request) {
        $rules = [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|between:0,150',
        ];

        $messages = [
            'name.required' => '名前は必ず入力してください。', // '項目名.ルール名' => 'メッセージ'
            'mail.email' => 'メールアドレスが必要です。',
            'age.numeric' => '年齢を整数で記入ください。',
            'age.between' => '年齢は0=150の間で入力ください。',
            'age.between' => '年齢は0~150の間で入力ください。',
        ];

        $validator = Validator::make($request->all(), $rules, $messages); // $messagesを第3引数に指定すればエラーメッセージが日本語に変わる
        if($validator->fails()) {
            return redirect(('/hello'))->withErrors($validator)->withInput();
        }
        return view('hello.index', ['msg'=>'正しく入力されました！']);
    }

}
