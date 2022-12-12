<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    // form
    // public function index() {
    //     $data = [
    //         'msg'=>'お名前を入力してください。',
    //     ];
    //     return view('hello.index', $data);
    // }

    // public function post(Request $request) {
    //     $msg = $request->msg; // name="msg"取得
    //     $data = [
    //         'msg'=>'こんにちは、' . $msg . 'さん！',
    //     ];
    //     return view('hello.index', $data);
    // }

    // ifディレクティブ
    //    public function index() {
    //     return view('hello.index', ['msg'=>'']);
    //    }

    // issetディレクティブ
    // public function index() { // GET時には$msgは未定義
    //     return view('hello.index');
    // }

    public function post(Request $request) { // POSTされると値が渡される
    return view('hello.index', ['msg'=>$request->msg]);
    }

    // foreachディレクティブ
    public function index() {
        $data = ['one', 'two', 'three', 'four', 'five'];
        return view('hello.index', ['data'=>$data]); // $dataを'data'に設定してテンプレートに渡す
    }


}
