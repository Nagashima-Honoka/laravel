<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;

class HelloController extends Controller
{
    public function index(Request $request) {
        if ($request->hasCookie('msg')) { // hasCookie: 指揮数に指定したキーのクッキーが保管されているかどうかを調べる
            $msg = 'Cookie: ' . $request->cookie('msg'); // trueであれば値を取得
        } else {
            $msg = '※クッキーはありません。';
        }
        return view('hello.index', ['msg'=> $msg]);
    }

    public function post(Request $request) {
        $validate_rule = [
            'msg' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $msg = $request->msg;
        $response = response()->view('hello.index', ['msg' => '「' . $msg . '」をクッキーに保存しました。']); // クッキーを利用する場合は、Responseを用意し、cookieで保存してから、そのResponseをreturnするようにしてやる必要がある
        $response->cookie('msg', $msg, 100); // クッキーはクライアント側に保存されるためのものであるから、クッキーを設定したレスポンスをクライアントに返さないと保存はされない
        return $response;
    }
}
